<?php
class ServiceModel extends Model
{
    public function addService($data, $slotNo)
    {
        $noofTimeSlots = 1;

        $totalTimeDuration = (int)$data['slot1Duration'] + (int)$data['slot2Duration'] + (int)$data['slot3Duration'] + (int)$data['interval1Duration'] + (int)$data['interval2Duration'];

        if ($slotNo == 1)
        {
            $noofTimeSlots = 2;
        }
        elseif ($slotNo == 2)
        {
            $noofTimeSlots = 3;
        }

        if (empty($data['sSelectedType']))
        {
            $this->insert('services', ['name' => $data['name'], 'customerCategory' => $data['customerCategory'], 'price' => $data['price'], 'type' => $data['sNewType'], 'noofTimeSlots' => $noofTimeSlots, 'totalDuration' => $totalTimeDuration, 'status' => 1]);
        }
        else
        {
            $this->insert('services', ['name' => $data['name'], 'customerCategory' => $data['customerCategory'], 'price' => $data['price'], 'type' => $data['sSelectedType'], 'noofTimeSlots' => $noofTimeSlots, 'totalDuration' => $totalTimeDuration, 'status' => 1]);
        }
    }

    public function addServiceProvider($data)
    {
        foreach ($data['sSelectedProv'] as $SelectedProv)
        {
            $this->customQuery("INSERT INTO serviceproviders (serviceID, staffID) SELECT MAX(serviceID), '$SelectedProv' FROM services", []);
        }
    }

    public function addTimeSlot($data, $slotNo)
    {
        $startingTime1 = 0;
        $startingTime2 = (int)$data['slot1Duration'] + (int)$data['interval1Duration'];
        $startingTime3 = $startingTime2 + (int)$data['slot2Duration'] + (int)$data['interval2Duration'];

        if ($slotNo == 0)
        {
            $slot1Duration = $data['slot1Duration'];

            $this->customQuery("INSERT INTO timeslots (serviceID, slotNo, startingTime, duration) SELECT MAX(serviceID), '1', '$startingTime1' ,'$slot1Duration'  FROM services", []);
        }
        elseif ($slotNo == 1)
        {
            $slot1Duration = $data['slot1Duration'];
            $slot2Duration = $data['slot2Duration'];


            $this->customQuery("INSERT INTO timeslots (serviceID, slotNo, startingTime, duration) SELECT MAX(serviceID), '1', '$startingTime1','$slot1Duration'  FROM services", []);
            $this->customQuery("INSERT INTO timeslots (serviceID, slotNo, startingTime, duration) SELECT MAX(serviceID), '2', '$startingTime2', '$slot2Duration'  FROM services", []);
        }
        elseif ($slotNo == 2)
        {
            $slot1Duration = $data['slot1Duration'];
            $slot2Duration = $data['slot2Duration'];
            $slot3Duration = $data['slot3Duration'];

            $this->customQuery("INSERT INTO timeslots (serviceID, slotNo, startingTime, duration) SELECT MAX(serviceID), '1', '$startingTime1', '$slot1Duration'  FROM services", []);
            $this->customQuery("INSERT INTO timeslots (serviceID, slotNo, startingTime, duration) SELECT MAX(serviceID), '2', '$startingTime2','$slot2Duration'  FROM services", []);
            $this->customQuery("INSERT INTO timeslots (serviceID, slotNo, startingTime, duration) SELECT MAX(serviceID), '3', '$startingTime3','$slot3Duration'  FROM services", []);
        }
    }
    public function addIntervalTimeSlot($data, $slotNo)
    {

        if ($slotNo == 1)
        {
            $interval1Duration = $data['interval1Duration'];

            $this->customQuery("INSERT INTO intervals (serviceID, slotNo, duration) SELECT MAX(serviceID), '2', '$interval1Duration'  FROM services", []);
        }
        elseif ($slotNo == 2)
        {
            $interval1Duration = $data['interval1Duration'];
            $interval2Duration = $data['interval2Duration'];

            $this->customQuery("INSERT INTO intervals (serviceID, slotNo, duration) SELECT MAX(serviceID), '2', '$interval1Duration'  FROM services", []);
            $this->customQuery("INSERT INTO intervals (serviceID, slotNo, duration) SELECT MAX(serviceID), '3', '$interval2Duration'  FROM services", []);
        }
    }

    public function addResourcesToService($data, $slotNo)
    {
        $i = 0;
        foreach ($data['sResArray'] as $ResoursesArray)
        {
            if ($data['sSelectedResCount1'][$i] != 0)
            {
                $selCount = $data['sSelectedResCount1'][$i];

                $this->customQuery("INSERT INTO resourceallocation (serviceID, slotNo, resourceID, requiredQuantity) SELECT MAX(serviceID), '1', '$ResoursesArray->resourceID','$selCount' FROM services", []);
            }
            $i++;
        }

        if ($slotNo == 1)
        {
            $i = 0;
            foreach ($data['sResArray'] as $ResoursesArray)
            {
                if ($data['sSelectedResCount2'][$i] != NULL && $data['sSelectedResCount2'][$i] != 0)
                {
                    $selCount = $data['sSelectedResCount2'][$i];

                    $this->customQuery("INSERT INTO resourceallocation (serviceID, slotNo, resourceID, requiredQuantity) SELECT MAX(serviceID), '2', '$ResoursesArray->resourceID','$selCount' FROM services", []);
                }
                $i++;
            }
        }
        elseif ($slotNo == 2)
        {
            $i = 0;
            foreach ($data['sResArray'] as $ResoursesArray)
            {
                if ($data['sSelectedResCount2'][$i] != NULL && $data['sSelectedResCount2'][$i] != 0)
                {
                    $selCount = $data['sSelectedResCount2'][$i];

                    $this->customQuery("INSERT INTO resourceallocation (serviceID, slotNo, resourceID, requiredQuantity) SELECT MAX(serviceID), '2', '$ResoursesArray->resourceID','$selCount' FROM services", []);
                }
                if ($data['sSelectedResCount3'][$i] != NULL && $data['sSelectedResCount3'][$i] != 0)
                {
                    $selCount = $data['sSelectedResCount3'][$i];

                    $this->customQuery("INSERT INTO resourceallocation (serviceID, slotNo, resourceID, requiredQuantity) SELECT MAX(serviceID), '3', '$ResoursesArray->resourceID','$selCount' FROM services", []);
                }
                $i++;
            }
        }
    }
    //////////////// START UPDATE SERVICE ////////////////
    public function updateService($serviceID, $data, $slotNo)
    {
        $noofTimeSlots = 1;

        $totalTimeDuration = (int)$data['slot1Duration'] + (int)$data['slot2Duration'] + (int)$data['slot3Duration'] + (int)$data['interval1Duration'] + (int)$data['interval2Duration'];

        if ($slotNo == 1)
        {
            $noofTimeSlots = 2;
        }
        elseif ($slotNo == 2)
        {
            $noofTimeSlots = 3;
        }

        if ($data['sNewType'])
        {
            $this->customQuery(
                "UPDATE services 
                            SET name=:name, customerCategory=:customerCategory, type=:type, noofTimeSlots=:noofTimeSlots, totalDuration=:totalDuration, price=:price 
                            WHERE  serviceID=:serviceID",
                ['serviceID' => $serviceID, 'name' => $data['name'], 'customerCategory' => $data['customerCategory'], 'type' => $data['sNewType'], 'noofTimeSlots' => $noofTimeSlots, 'totalDuration' => $totalTimeDuration, 'price' => $data['price']]
            );
        }
        else
        {
            $this->customQuery(
                "UPDATE services 
                            SET name=:name, customerCategory=:customerCategory, type=:type, noofTimeSlots=:noofTimeSlots, totalDuration=:totalDuration, price=:price 
                            WHERE  serviceID=:serviceID",
                ['serviceID' => $serviceID, 'name' => $data['name'], 'customerCategory' => $data['customerCategory'], 'type' => $data['sSelectedType'], 'noofTimeSlots' => $noofTimeSlots, 'totalDuration' => $totalTimeDuration, 'price' => $data['price']]
            );
        }
    }
    public function updateServiceProviders($serviceID, $data, $serProvDetails)
    {

        for ($i = 0; $i < count($serProvDetails); $i++)
        {
            if (!empty($serProvDetails) && !in_array($serProvDetails[$i]->staffID, $data['sSelectedProv']))
            {
                $this->customQuery("DELETE from serviceproviders WHERE serviceID=:serviceID AND staffID=:staffID", ['serviceID' => $serviceID, 'staffID' => $serProvDetails[$i]->staffID]);
                unset($serProvDetails[$i]);
            }
        }
        $serProvDetails = array_values($serProvDetails);

        print_r($data['sSelectedProv']);

        $sProvId = array();

        if (!empty($serProvDetails))
        {
            for ($i = 0; $i < count($serProvDetails); $i++)
            {
                array_push($sProvId, $serProvDetails[$i]->staffID);
            }
        }
        foreach ($data['sSelectedProv'] as $SelectedProv)
        {
            if (!empty($serProvDetails))
            {
                if (!in_array($SelectedProv, $sProvId))
                {
                    $this->insert('serviceproviders', ['serviceID' => $serviceID, 'staffID' => $SelectedProv]);
                }
            }
            else
            {
                $this->insert('serviceproviders', ['serviceID' => $serviceID, 'staffID' => $SelectedProv]);
            }
        }
    }
    public function addNewSlotsFromUpdate($serviceID, $data, $slotNo)
    {
        $startingTime2 = (int)$data['slot1Duration'] + (int)$data['interval1Duration'];
        $startingTime3 = $startingTime2 + (int)$data['slot2Duration'] + (int)$data['interval2Duration'];
        $slot2Duration = $data['slot2Duration'];
        $slot3Duration = $data['slot3Duration'];
        $interval1Duration = $data['interval1Duration'];
        $interval2Duration = $data['interval2Duration'];


        if ($data['noofSlots'] == 1)
        {
            if ($slotNo == 1)
            {
                $this->insert('intervals', ['serviceID' => $serviceID, 'slotNo' => 2, 'duration' => $interval1Duration]);
                $this->insert('timeslots', ['serviceID' => $serviceID, 'slotNo' => 2, 'startingTime' => $startingTime2, 'duration' => $slot2Duration]);
            }
            elseif ($slotNo == 2)
            {
                $this->insert('intervals', ['serviceID' => $serviceID, 'slotNo' => 2, 'duration' => $interval1Duration]);
                $this->insert('timeslots', ['serviceID' => $serviceID, 'slotNo' => 2, 'startingTime' => $startingTime2, 'duration' => $slot2Duration]);

                $this->insert('intervals', ['serviceID' => $serviceID, 'slotNo' => 3, 'duration' => $interval2Duration]);
                $this->insert('timeslots', ['serviceID' => $serviceID, 'slotNo' => 3, 'startingTime' => $startingTime3, 'duration' => $slot3Duration]);
            }
        }
        elseif ($data['noofSlots'] == 2)
        {
            if ($slotNo == 2)
            {
                $this->insert('intervals', ['serviceID' => $serviceID, 'slotNo' => 3, 'duration' => $interval2Duration]);
                $this->insert('timeslots', ['serviceID' => $serviceID, 'slotNo' => 3, 'startingTime' => $startingTime3, 'duration' => $slot3Duration]);
            }
        }
    }
    public function updateAllocatedResources($serviceID, $data, $slotNo, $resDetailsSlot1, $resDetailsSlot2, $resDetailsSlot3)
    {
        $i = 0;
        $checkedResources1 = array();
        $checkedResources2 = array();
        $checkedResources3 = array();

        for ($j = 0; $j < count($resDetailsSlot1); $j++)
        {
            array_push($checkedResources1, $resDetailsSlot1[$j]->resourceID);
        }
        for ($j = 0; $j < count($resDetailsSlot2); $j++)
        {
            array_push($checkedResources2, $resDetailsSlot2[$j]->resourceID);
        }
        for ($j = 0; $j < count($resDetailsSlot3); $j++)
        {
            array_push($checkedResources3, $resDetailsSlot3[$j]->resourceID);
        }

        if (($slotNo == 0) && ($data['noofSlots'] == 2 || $data['noofSlots'] == 3))
        {
            $this->customQuery("DELETE from resourceallocation 
                                    WHERE serviceID=:serviceID AND slotNo=:slotNo", ['serviceID' => $serviceID, 'slotNo' => 2]);
        }
        if (($slotNo == 1 || $slotNo == 0) && ($data['noofSlots'] == 3))
        {
            $this->customQuery("DELETE from resourceallocation 
                                    WHERE serviceID=:serviceID AND slotNo=:slotNo", ['serviceID' => $serviceID, 'slotNo' => 3]);
        }

        foreach ($data['sResArray'] as $ResoursesArray)
        {
            $selCount = $data['sSelectedResCount1'][$i];

            for ($j = 0; $j < count($resDetailsSlot1); $j++)
            {

                if ($ResoursesArray->resourceID == $resDetailsSlot1[$j]->resourceID && $selCount != $resDetailsSlot1[$j]->requiredQuantity)
                {

                    if ($selCount == 0)
                    {
                        $this->customQuery("DELETE from resourceallocation 
                                            WHERE serviceID=:serviceID AND slotNo=:slotNo AND resourceID=:resourceID", ['serviceID' => $serviceID, 'slotNo' => 1, 'resourceID' => $ResoursesArray->resourceID]);
                    }
                    else
                    {

                        $this->customQuery(
                            "UPDATE resourceallocation 
                                            SET requiredQuantity=:requiredQuantity
                                            WHERE  serviceID=:serviceID AND slotNo=:slotNo AND resourceID=:resourceID",
                            ['serviceID' => $serviceID, 'slotNo' => 1, 'resourceID' => $ResoursesArray->resourceID, 'requiredQuantity' => $selCount]
                        );
                    }
                }
            }


            if (!in_array($ResoursesArray->resourceID, $checkedResources1) &&  ($selCount != 0 && $selCount != NULL))
            {
                $this->insert('resourceallocation', ['serviceID' => $serviceID, 'slotNo' => 1, 'resourceID' => $ResoursesArray->resourceID,  'requiredQuantity' => $selCount]);
            }
            $i++;
        }

        if ($slotNo == 1)
        {
            $i = 0;
            foreach ($data['sResArray'] as $ResoursesArray)
            {
                $selCount = $data['sSelectedResCount2'][$i];

                for ($j = 0; $j < count($resDetailsSlot2); $j++)
                {

                    if ($ResoursesArray->resourceID == $resDetailsSlot2[$j]->resourceID && $selCount != $resDetailsSlot2[$j]->requiredQuantity)
                    {
                        if ($selCount == 0)
                        {
                            $this->customQuery("DELETE from resourceallocation 
                                                WHERE serviceID=:serviceID AND slotNo=:slotNo AND resourceID=:resourceID", ['serviceID' => $serviceID, 'slotNo' => 2, 'resourceID' => $ResoursesArray->resourceID]);
                        }
                        else
                        {
                            $this->customQuery(
                                "UPDATE resourceallocation 
                                                SET requiredQuantity=:requiredQuantity
                                                WHERE  serviceID=:serviceID AND slotNo=:slotNo AND resourceID=:resourceID",
                                ['serviceID' => $serviceID, 'slotNo' => 2, 'resourceID' => $ResoursesArray->resourceID, 'requiredQuantity' => $selCount]
                            );
                        }
                    }
                }
                if (!in_array($ResoursesArray->resourceID, $checkedResources2) &&   ($selCount != 0 && $selCount != NULL))
                {
                    // die('xdsd');
                    $this->insert('resourceallocation', ['serviceID' => $serviceID, 'slotNo' => 2, 'resourceID' => $ResoursesArray->resourceID,  'requiredQuantity' => $selCount]);
                }
                $i++;
            }
        }
        elseif ($slotNo == 2)
        {
            $i = 0;
            foreach ($data['sResArray'] as $ResoursesArray)
            {
                $selCount = $data['sSelectedResCount2'][$i];

                for ($j = 0; $j < count($resDetailsSlot2); $j++)
                {

                    if ($ResoursesArray->resourceID == $resDetailsSlot2[$j]->resourceID && $selCount != $resDetailsSlot2[$j]->requiredQuantity)
                    {

                        if ($selCount == 0)
                        {
                            $this->customQuery("DELETE from resourceallocation 
                                                WHERE serviceID=:serviceID AND slotNo=:slotNo AND resourceID=:resourceID", ['serviceID' => $serviceID, 'slotNo' => 2, 'resourceID' => $ResoursesArray->resourceID]);
                        }
                        else
                        {
                            $this->customQuery(
                                "UPDATE resourceallocation 
                                                SET requiredQuantity=:requiredQuantity
                                                WHERE  serviceID=:serviceID AND slotNo=:slotNo AND resourceID=:resourceID",
                                ['serviceID' => $serviceID, 'slotNo' => 2, 'resourceID' => $ResoursesArray->resourceID, 'requiredQuantity' => $selCount]
                            );
                        }
                    }
                }
                if (!in_array($ResoursesArray->resourceID, $checkedResources2) &&  ($selCount != 0 && $selCount != NULL))
                {
                    $this->insert('resourceallocation', ['serviceID' => $serviceID, 'slotNo' => 2, 'resourceID' => $ResoursesArray->resourceID,  'requiredQuantity' => $selCount]);
                }

                $selCount = $data['sSelectedResCount3'][$i];

                for ($j = 0; $j < count($resDetailsSlot3); $j++)
                {

                    if ($ResoursesArray->resourceID == $resDetailsSlot3[$j]->resourceID && $selCount != $resDetailsSlot3[$j]->requiredQuantity)
                    {

                        if ($selCount == 0)
                        {
                            $this->customQuery("DELETE from resourceallocation 
                                                WHERE serviceID=:serviceID AND slotNo=:slotNo AND resourceID=:resourceID", ['serviceID' => $serviceID, 'slotNo' => 3, 'resourceID' => $ResoursesArray->resourceID]);
                        }
                        else
                        {
                            $this->customQuery(
                                "UPDATE resourceallocation 
                                                SET requiredQuantity=:requiredQuantity
                                                WHERE  serviceID=:serviceID AND slotNo=:slotNo AND resourceID=:resourceID",
                                ['serviceID' => $serviceID, 'slotNo' => 3, 'resourceID' => $ResoursesArray->resourceID, 'requiredQuantity' => $selCount]
                            );
                        }
                    }
                }
                if (!in_array($ResoursesArray->resourceID, $checkedResources3) &&   ($selCount != 0 && $selCount != NULL))
                {
                    $this->insert('resourceallocation', ['serviceID' => $serviceID, 'slotNo' => 3, 'resourceID' => $ResoursesArray->resourceID,  'requiredQuantity' => $selCount]);
                }
                $i++;
            }
        }
    }
    public function updateIntervals($serviceID, $data, $slotNo)
    {
        // print_r($serviceID . " " . $data['noofSlots']);
        // print_r($slotNo);
        // die('awa');
        if ($slotNo == 0)
        {
            // $interval1Duration = $data['interval1Duration'];

            // $this->customQuery(
            //     "UPDATE intervals 
            //                 SET duration=:duration
            //                 WHERE  serviceID=:serviceID AND slotNo=:slotNo",
            //     ['serviceID' => $serviceID, 'slotNo' => 2, 'duration' => $interval1Duration]
            // );
            if ($data['noofSlots'] == 2 || $data['noofSlots'] == 3)
            {
                $this->customQuery("DELETE from intervals WHERE serviceID=:serviceID AND slotNo=:slotNo", ['serviceID' => $serviceID, 'slotNo' => 2]);
            }
            if ($data['noofSlots'] == 3)
            {
                $this->customQuery("DELETE from intervals WHERE serviceID=:serviceID AND slotNo=:slotNo", ['serviceID' => $serviceID, 'slotNo' => 3]);
            }
        }
        elseif ($slotNo == 1)
        {
            $interval1Duration = $data['interval1Duration'];

            $this->customQuery(
                "UPDATE intervals 
                            SET duration=:duration
                            WHERE  serviceID=:serviceID AND slotNo=:slotNo",
                ['serviceID' => $serviceID, 'slotNo' => 2, 'duration' => $interval1Duration]
            );
            if ($data['noofSlots'] == 3)
            {
                $this->customQuery("DELETE from intervals WHERE serviceID=:serviceID AND slotNo=:slotNo", ['serviceID' => $serviceID, 'slotNo' => 3]);
            }
        }
        elseif ($slotNo == 2)
        {
            $interval1Duration = $data['interval1Duration'];
            $interval2Duration = $data['interval2Duration'];

            $this->customQuery(
                "UPDATE intervals 
                            SET duration=:duration
                            WHERE  serviceID=:serviceID AND slotNo=:slotNo",
                ['serviceID' => $serviceID, 'slotNo' => 2, 'duration' => $interval1Duration]
            );

            $this->customQuery(
                "UPDATE intervals 
                            SET duration=:duration
                            WHERE  serviceID=:serviceID AND slotNo=:slotNo",
                ['serviceID' => $serviceID, 'slotNo' => 3, 'duration' => $interval2Duration]
            );
        }
    }
    public function updateTimeslots($serviceID, $data, $slotNo)
    {
        $startingTime1 = 0;
        $startingTime2 = (int)$data['slot1Duration'] + (int)$data['interval1Duration'];
        $startingTime3 = $startingTime2 + (int)$data['slot2Duration'] + (int)$data['interval2Duration'];

        if ($slotNo == 0)
        {
            $slot1Duration = $data['slot1Duration'];

            $this->customQuery(
                "UPDATE timeslots 
                            SET startingTime=:startingTime, duration=:duration
                            WHERE  serviceID=:serviceID AND slotNo=:slotNo",
                ['serviceID' => $serviceID, 'slotNo' => 1, 'startingTime' => $startingTime1, 'duration' => $slot1Duration]
            );
            if ($data['noofSlots'] == 2 || $data['noofSlots'] == 3)
            {
                $this->customQuery("DELETE from timeslots WHERE serviceID=:serviceID AND slotNo=:slotNo", ['serviceID' => $serviceID, 'slotNo' => 2]);
            }
            if ($data['noofSlots'] == 3)
            {
                $this->customQuery("DELETE from timeslots WHERE serviceID=:serviceID AND slotNo=:slotNo", ['serviceID' => $serviceID, 'slotNo' => 3]);
            }
        }
        elseif ($slotNo == 1)
        {
            $slot1Duration = $data['slot1Duration'];
            $slot2Duration = $data['slot2Duration'];

            $this->customQuery(
                "UPDATE timeslots 
                            SET startingTime=:startingTime, duration=:duration
                            WHERE  serviceID=:serviceID AND slotNo=:slotNo",
                ['serviceID' => $serviceID, 'slotNo' => 1, 'startingTime' => $startingTime1, 'duration' => $slot1Duration]
            );
            $this->customQuery(
                "UPDATE timeslots 
                            SET startingTime=:startingTime, duration=:duration
                            WHERE  serviceID=:serviceID AND slotNo=:slotNo",
                ['serviceID' => $serviceID, 'slotNo' => 2, 'startingTime' => $startingTime2, 'duration' => $slot2Duration]
            );
            if ($data['noofSlots'] == 3)
            {
                $this->customQuery("DELETE from timeslots WHERE serviceID=:serviceID AND slotNo=:slotNo", ['serviceID' => $serviceID, 'slotNo' => 3]);
            }
        }
        elseif ($slotNo == 2)
        {
            $slot1Duration = $data['slot1Duration'];
            $slot2Duration = $data['slot2Duration'];
            $slot3Duration = $data['slot3Duration'];

            $this->customQuery(
                "UPDATE timeslots 
                            SET startingTime=:startingTime, duration=:duration
                            WHERE  serviceID=:serviceID AND slotNo=:slotNo",
                ['serviceID' => $serviceID, 'slotNo' => 1, 'startingTime' => $startingTime1, 'duration' => $slot1Duration]
            );
            $this->customQuery(
                "UPDATE timeslots 
                            SET startingTime=:startingTime, duration=:duration
                            WHERE  serviceID=:serviceID AND slotNo=:slotNo",
                ['serviceID' => $serviceID, 'slotNo' => 2, 'startingTime' => $startingTime2, 'duration' => $slot2Duration]
            );
            $this->customQuery(
                "UPDATE timeslots 
                            SET startingTime=:startingTime, duration=:duration
                            WHERE  serviceID=:serviceID AND slotNo=:slotNo",
                ['serviceID' => $serviceID, 'slotNo' => 3, 'startingTime' => $startingTime3, 'duration' => $slot3Duration]
            );
        }
    }
    //////////////// END UPDATE SERVICE ////////////////

    public function getServiceDetails()
    {
        $results = $this->getResultSet("services", "*", []);

        return $results;
    }

    public function getServiceDetailsWithFilters($sID, $sType, $sStatus)
    {
        // $results = $this->getResultSet("services", "*", []);

        // return $results;

        $conditions = array();

        // Extract specially defined conditions to a separate array
        // Note that both tableName and columnName are used as the keys
        if ($sID != "all") $conditions["services.serviceID"] = $sID;
        if ($sType != "all") $conditions["services.type"] = $sType;
        if ($sStatus != "all") $conditions["services.status"] = $sStatus;

        $preparedConditions = array();
        $dataToBind = array();

        foreach ($conditions as $column => $value)
        {
            $colName = explode(".", $column, 2)[1]; // Only taking the column name for binding (discards tableName)
            array_push($preparedConditions, "$column = :$colName");
            $dataToBind[":$colName"] = $value;
        }

        $consditionsString = implode(" AND ", $preparedConditions);

        $SQLstatement =
            "SELECT *
        FROM services";

        // Appending conditions string
        if (!empty($conditions)) $SQLstatement .= " WHERE $consditionsString";

        $results = $this->customQuery($SQLstatement,  $dataToBind);
        return $results;
    }

    // Suggestion to rename this to getAllServiceProvidersData
    public function getServiceProviderDetails()
    {
        $results = $this->getResultSet('staff', ['staffID', 'fName', 'lName', 'status'], ['staffType' => 5]);

        return $results;
    }
    public function getAllManagersDetails()
    {
        $results = $this->getResultSet('staff', ['staffID', 'fName', 'lName'], ['staffType' => 3, 'status' => 1]);

        return $results;
    }
    // Suggestion to rename this to getAllServiceTypes
    public function getServiceTypeDetails()
    {
        $results = $this->customQuery("SELECT DISTINCT type FROM services", []);

        return $results;
    }

    public function getResourceDetails()
    {
        $results = $this->getResultSet('resources', ['resourceID', 'name', 'quantity'], null);

        return $results;
    }

    public function getNoofSlots($serviceID)
    {
        $noofSlots = $this->getResultSet('services', ['noofTimeSlots'], ['serviceID' => $serviceID]);

        if ($noofSlots != NULL)
        {
            $x = $noofSlots[0]->noofTimeSlots;
            return $x;
        }
    }

    public function getOneServiceDetail($serviceID)
    {
        $results = $this->getResultSet('services', '*', ['serviceID' => $serviceID]);

        return $results;
    }

    public function getOneServicesSProvDetail($serviceID)
    {
        $results = $this->customQuery(
            "SELECT serviceproviders.staffID,staff.fName,staff.lName 
                          FROM staff 
                          INNER JOIN serviceproviders
                          ON serviceproviders.staffID = staff.staffID
                          WHERE serviceproviders.serviceID=:sID",
            [':sID' => $serviceID]
        );

        return $results;
    }

    public function getSlotDuration($serviceID, $slotNo)
    {
        if ($slotNo == 1)
        {
            $duration = $this->customQuery(
                "SELECT duration 
                          FROM timeslots 
                          WHERE serviceID=:sID AND slotNo=:slotNo",
                [':sID' => $serviceID, ':slotNo' => 1]
            );
        }
        elseif ($slotNo == 2)
        {
            $duration = $this->customQuery(
                "SELECT duration 
                        FROM timeslots 
                        WHERE serviceID=:sID AND slotNo=:slotNo",
                [':sID' => $serviceID, ':slotNo' => 2]
            );
        }
        elseif ($slotNo == 3)
        {
            $duration = $this->customQuery(
                "SELECT duration 
                        FROM timeslots 
                        WHERE serviceID=:sID AND slotNo=:slotNo",
                [':sID' => $serviceID, ':slotNo' => 3]
            );
        }

        if ($duration != NULL)
        {
            $x = $duration[0]->duration;
            return $x;
        }
    }

    public function getIntervalDuration($serviceID, $slotNo)
    {
        if ($slotNo == 2)
        {
            $duration = $this->customQuery(
                "SELECT duration 
                        FROM intervals 
                        WHERE serviceID=:sID AND slotNo=:slotNo",
                [':sID' => $serviceID, ':slotNo' => 2]
            );
        }
        elseif ($slotNo == 3)
        {
            $duration = $this->customQuery(
                "SELECT duration 
                        FROM intervals 
                        WHERE serviceID=:sID AND slotNo=:slotNo",
                [':sID' => $serviceID, ':slotNo' => 3]
            );
        }

        if ($duration != NULL)
        {
            $x = $duration[0]->duration;
            return $x;
        }
    }

    public function getAllocatedResourceDetailsofSlot($serviceID, $slotNo)
    {

        if ($slotNo == 1)
        {
            $results = $this->customQuery(
                "SELECT resources.resourceID,resources.name,resourceallocation.requiredQuantity 
                                        FROM resources 
                                        INNER JOIN resourceallocation
                                        ON resources.resourceID = resourceallocation.resourceID
                                        WHERE resourceallocation.serviceID=:sID AND resourceallocation.slotNo=:slotNo AND resourceallocation.requiredQuantity <> 0",
                [':sID' => $serviceID, ':slotNo' => 1]
            );
        }
        elseif ($slotNo == 2)
        {
            $results = $this->customQuery(
                "SELECT resources.resourceID,resources.name,resourceallocation.requiredQuantity 
                                        FROM resources 
                                        INNER JOIN resourceallocation
                                        ON resources.resourceID = resourceallocation.resourceID
                                        WHERE resourceallocation.serviceID=:sID AND resourceallocation.slotNo=:slotNo AND resourceallocation.requiredQuantity <> 0",
                [':sID' => $serviceID, ':slotNo' => 2]
            );
        }
        elseif ($slotNo == 3)
        {
            $results = $this->customQuery(
                "SELECT resources.resourceID,resources.name,resourceallocation.requiredQuantity 
                                        FROM resources 
                                        INNER JOIN resourceallocation
                                        ON resources.resourceID = resourceallocation.resourceID
                                        WHERE resourceallocation.serviceID=:sID AND resourceallocation.slotNo=:slotNo AND resourceallocation.requiredQuantity <> 0",
                [':sID' => $serviceID, ':slotNo' => 3]
            );
        }

        return $results;
    }

    public function getServiceProvidersByService($serviceID)
    {

        $results = $this->customQuery(
            "SELECT staff.staffID, staff.fName, staff.lName
                          FROM staff 
                          INNER JOIN serviceproviders 
                          ON serviceproviders.staffID = staff.staffID
                          WHERE serviceproviders.serviceID = :sID",
            [':sID' => $serviceID]
        );

        return $results;
    }

    public function getServiceDurationCategoryPrice($serviceID)
    {
        $results = $this->getSingle('services', ['totalDuration', 'customerCategory', 'price'], ['serviceID' => $serviceID]);

        return $results;
    }

    // START FOR MANAGER OVERVIEW
    public function getAllAvailableServices()
    {
        $results = $this->getResultSet("services",  "*",  ["status" => 1]);

        return $results;
    }

    public function getAvailableServiceCount()
    {
        $results = $this->getRowCount('services', ['status' => 1]);

        return $results;
    }
    public function getAvailableServiceProvidersCount()
    {
        $results = $this->customQuery("SELECT COUNT(*) AS serProvCount FROM staff WHERE staffType = 5  AND status = 1");

        return $results;
    }
    // END FOR MANAGER OVERVIEW

    // START FOR MANAGER UPDATE SERVICE
    public function changeServiceStatus($serviceID, $state)
    {
        $results =  $this->update('services', ['status' => $state], ['serviceID' => $serviceID]);
    }
    // END FOR MANAGER UPDATE SERVICE

    // START FOR ANALYTICS 
    public function getDetailsForServiceReportJS($serviceID, $year, $month)
    {
        $results = $this->customQuery(
            "SELECT S.serviceID, S.name, S.status, COUNT(DISTINCT SP.staffID) AS NoOFStaff, COUNT(DISTINCT RES.reservationID) AS NoOfRes, COUNT(DISTINCT RES.reservationID)*S.price AS TotalServicePrice
                                        FROM services AS S
                                        INNER JOIN serviceproviders AS SP
                                        ON S.serviceID = SP.serviceID
                                        AND SP.serviceID = :serviceID
                                        LEFT JOIN reservations AS RES 
                                        ON S.serviceID = RES.serviceID
                                        AND RES.serviceID = :serviceID AND RES.status = 4 AND MONTH(RES.date) = $month AND YEAR(RES.date)=$year",
            ['serviceID' => $serviceID]
        );
        return $results;
    }

    // public function getDetailsForServiceProvReportJS($staffID, $year, $month)
    // {
    //     $results = $this->customQuery(
    //         "SELECT S.staffID, S.fName, S.lName, S.status, COUNT(SP.serviceID) AS NoOFService, COUNT(DISTINCT RES.reservationID) AS NoOfRes,COUNT(DISTINCT RES.reservationID) * SV.price AS TotalServicePrice
    //                                 FROM staff AS S
    //                                 INNER JOIN serviceproviders AS SP
    //                                 ON S.staffID = SP.staffID AND SP.staffID = :staffID
    //                                 INNER JOIN services AS SV
    //                                 ON SP.serviceID = SV.serviceID
    //                                 LEFT JOIN reservations AS RES
    //                                 ON S.staffID = RES.staffID 
    //                                 AND S.staffID = :staffID AND RES.status = 4 AND S.staffType = 5 AND MONTH(RES.date) =  $month AND YEAR(RES.date) = $year",
    //         ['staffID' => $staffID]
    //     );
    //     return $results;
    // }
    public function getDetailsForServiceProvReportJS($staffID, $year, $month)
    {
        $results = $this->customQuery(
            "SELECT GG.staffID, GG.fName, GG.lName, COUNT(GG.serviceID) AS NoOFService, SUM(GG.resCount) AS NoOfRes, SUM(GG.serPrice * GG.resCount) AS TotalServicePrice FROM ( SELECT S.staffID, S.fName, S.lName, S.status, SV.serviceID, SV.price AS serPrice, COUNT(R.reservationID) AS resCount
            FROM
                staff AS S
            INNER JOIN serviceproviders AS SP
            ON
                S.staffID = SP.staffID AND  S.staffID=:staffID
            INNER JOIN services AS SV
            ON
                SP.serviceID = SV.serviceID
            LEFT JOIN reservations AS R
            ON
                S.staffID = R.staffID AND SV.serviceID = R.serviceID AND R.status = 4 AND MONTH(R.date) = $month AND YEAR(R.date) = $year
            WHERE
            S.staffID = :staffID AND S.staffType = 5
            GROUP BY
                S.staffID,
                SV.serviceID
        ) GG
        GROUP BY staffID",
            ['staffID' => $staffID]
        );
        return $results;
    }

    public function getServiceAnalyticsDetails($serviceID, $from, $to)
    {
        if ($serviceID != 0)
        {
            $results = $this->customQuery(
                "SELECT DATE_FORMAT(reservations.date, '%M') AS YearAndMonth, MONTH(reservations.date) AS month, SUM(services.price) AS TotalIncome, COUNT(*) AS TotalReservations
                                    FROM services
                                    INNER JOIN reservations ON reservations.serviceID = services.serviceID
                                    WHERE reservations.status = :status AND ( DATE_FORMAT(reservations.date, '%Y-%m') BETWEEN '$from' AND '$to') AND services.serviceID=$serviceID
                                    GROUP BY DATE_FORMAT(reservations.date, '%Y-%m')
                                    ORDER BY reservations.date, DATE_FORMAT(reservations.date, '%Y-%m')",
                [':status' => 4]
            );
        }
        else
        {
            $results = $this->customQuery(
                "SELECT DATE_FORMAT(reservations.date, '%M') AS YearAndMonth, MONTH(reservations.date) AS month, SUM(services.price) AS TotalIncome, COUNT(*) AS TotalReservations
                                    FROM services
                                    INNER JOIN reservations ON reservations.serviceID = services.serviceID
                                    WHERE reservations.status = :status AND (DATE_FORMAT(reservations.date, '%Y-%m') BETWEEN '$from' AND '$to')
                                    GROUP BY DATE_FORMAT(reservations.date, '%Y-%m')
                                    ORDER BY reservations.date, DATE_FORMAT(reservations.date, '%Y-%m')",
                [':status' => 4]
            );
        }

        return $results;
    }
    public function getServiceProvAnalyticsDetails($staffID, $from, $to)
    {
        if ($staffID != 0)
        {
            $results = $this->customQuery(
                "SELECT DATE_FORMAT(reservations.date, '%M') AS YearAndMonth, MONTH(reservations.date) AS monthNo, SUM(services.price) AS TotalIncome, COUNT(*) AS TotalReservations
            FROM reservations
            INNER JOIN services ON reservations.serviceID = services.serviceID
            WHERE reservations.status = :status AND (DATE_FORMAT(reservations.date, '%Y-%m') BETWEEN '$from' AND '$to') AND reservations.staffID=$staffID
            GROUP BY DATE_FORMAT(reservations.date, '%Y-%m')
            ORDER BY reservations.date, DATE_FORMAT(reservations.date, '%Y-%m')",
                [':status' => 4]
            );
        }
        else
        {
            $results = $this->customQuery(
                "SELECT DATE_FORMAT(reservations.date, '%M') AS YearAndMonth, MONTH(reservations.date) AS monthNo, SUM(services.price) AS TotalIncome, COUNT(*) AS TotalReservations
            FROM reservations
            INNER JOIN services ON reservations.serviceID = services.serviceID
            WHERE reservations.status = :status AND (DATE_FORMAT(reservations.date, '%Y-%m') BETWEEN '$from' AND '$to')
            GROUP BY DATE_FORMAT(reservations.date, '%Y-%m')
            ORDER BY reservations.date, DATE_FORMAT(reservations.date, '%Y-%m')",
                [':status' => 4]
            );
        }
        return $results;
    }
    public function getTop5ServiceProvs()
    {
        $results = $this->customQuery(
            "SELECT reservations.staffID, staff.fName, staff.lName, COUNT(*) AS resCount, SUM(services.price) AS totIncome
            FROM reservations
            INNER JOIN services ON services.serviceID = reservations.serviceID
            INNER JOIN staff ON reservations.staffID = staff.staffID AND staff.status = :status2
            WHERE reservations.status = :status1 AND (MONTH(reservations.date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) AND YEAR(reservations.date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH))
            GROUP BY reservations.staffID
            ORDER BY SUM(services.price) DESC
            LIMIT 5",
            [':status1' => 4, 'status2' => 1]
        );
        return $results;
    }
    public function getTop5Services()
    {
        $results = $this->customQuery(
            "SELECT services.name, COUNT(DISTINCT reservations.reservationID), COUNT( DISTINCT reservations.serviceID)* SUM(services.price) AS totIncome
                                    FROM reservations
                                    INNER JOIN services ON reservations.serviceID = services.serviceID AND services.status = :status2
                                    WHERE reservations.status = :status1 AND (MONTH(reservations.date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) AND YEAR(reservations.date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH))
                                    GROUP BY reservations.serviceID
                                    ORDER BY SUM(services.price) DESC
                                    LIMIT 5;",
            [':status1' => 4, 'status2' => 1]
        );
        return $results;
    }
    // END FOR ANALYTICS 

    // Returns required resources of each slot with start and end times of a given service.
    public function getServiceSlotsSummary($serviceID)
    {
        $SQLstatement =
            "SELECT TS.slotNo, 
                    RA.resourceID, 
                    RA.requiredQuantity, 
                    TS.startingTime AS givenStartTime, 
                    TS.startingTime + TS.duration AS givenEndTime
            FROM timeslots AS TS
            INNER JOIN resourceallocation AS RA
            ON RA.serviceID = TS.serviceID AND RA.slotNo = TS.slotNo
            WHERE TS.serviceID = :serviceID;";

        $results = $this->customQuery(
            $SQLstatement,
            [":serviceID" => $serviceID]
        );
        return $results;
    }
}
