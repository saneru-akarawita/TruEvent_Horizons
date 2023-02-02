<?php

class Model
{
   protected $dbh;
   private $PDOstatement;
   private $dataToBind = array();

   public function __construct()
   {
      $db = new Database;
      $this->dbh = $db->getConnection();
   }

   public function beginTransaction()
   {
      $this->dbh->beginTransaction();
   }

   public function commit()
   {
      $this->dbh->commit();
   }
   public function rollBack()
   {
      $this->dbh->rollBack();
   }

   public function query($sql)
   {
      $this->PDOstatement = $this->dbh->prepare($sql);
      if (!is_null($this->dataToBind))
      {
         $this->bindValues();
      }
      $result =  $this->PDOstatement->execute();
      $this->dataToBind = (array) null;
      return $result;
   }

   public function bind($param, $value, $type = null)
   {
      if (is_null($type))
      {
         switch (true)
         {
            case is_int($value):
               $type = PDO::PARAM_INT;
               break;
            case is_bool($value):
               $type = PDO::PARAM_BOOL;
               break;
            case is_null($value):
               $type = PDO::PARAM_NULL;
               break;
            default:
               $type = PDO::PARAM_STR;
               break;
         }
      }

      $result = $this->PDOstatement->bindValue($param, $value, $type);
      
   }

   public function bindValues()
   {
      // var_dump($this->dataToBind);
      foreach ($this->dataToBind as $column => $value)
      {
         $this->bind($column, $value);
      }
   }

   public function prepareColumnsNValues($conditions, $type)
   {
      // type 0 = ['column = value',...]
      // type 1 = (['column, ... ],[value, ....])
      if ($type == 0)
      {
         $preparedColumnsNValues = array();

         foreach ($conditions as $column => $value)
         {
            array_push($preparedColumnsNValues, "$column = :$column");
            $this->dataToBind[":$column"] = $value;
         }
         return $preparedColumnsNValues;
      }
      else if ($type == 1)
      {
         $preparedColumns = array_keys($conditions);
         $preparedValues = array();

         foreach ($conditions as $column => $value)
         {
            array_push($preparedValues, ":$column");
            $this->dataToBind[":$column"] = $value;
         }
         $preparedColumnsNValues = [
            'columns' => $preparedColumns,
            'values' => $preparedValues
         ];
         return $preparedColumnsNValues;
      }
   }

   public function prepareSelectStatement($tableName, $columns, $conditions)
   {
      if (is_array($columns))
         $requestedColumns = implode(', ', $columns);

      else if ($columns == '*')
         $requestedColumns = '*';

      else
         die("Query error");

      $SQLstatement = "SELECT $requestedColumns FROM $tableName";

      if (!empty($conditions))
      {
         $preparedConditions = implode(" AND ", $this->prepareColumnsNValues($conditions, 0));
         $SQLstatement .= " WHERE $preparedConditions";
      }
      $this->query($SQLstatement);
   }

   public function getResultSet($tableName, $columns, $conditions = NULL)
   {
      $this->prepareSelectStatement($tableName, $columns, $conditions);
      $result = $this->PDOstatement->fetchAll(PDO::FETCH_OBJ);

      return $result;
   }

   public function getSingle($tableName, $columns, $conditions = NULL)
   {
      $this->prepareSelectStatement($tableName, $columns, $conditions);
      $result = $this->PDOstatement->fetch(PDO::FETCH_OBJ);

      return $result;
   }

   // TODO: Test
   public function getRowCount($tableName, $conditions = NULL)
   {
      $this->prepareSelectStatement($tableName, '*', $conditions);
      $result = $this->PDOstatement->rowCount();
      return $result;
   }

   // insert('resources',['name' => 'Hair Trimmer', 'quantity' => 5]);
   public function insert($tableName, $values)
   {
      $preparedColumnsNValues =  $this->prepareColumnsNValues($values, 1);
      $preparedColumns = implode(", ", $preparedColumnsNValues['columns']);
      $preparedValues = implode(", ", $preparedColumnsNValues['values']);
      $SQLstatement = "INSERT INTO $tableName ($preparedColumns) VALUES ($preparedValues)";

      return $this->query($SQLstatement);
   }

   // delete ('resources',['name' => 'Hair Trimmer', 'quantity' => 5]);
   public function delete($tableName, $conditions)
   {
      $preparedConditions = implode(" AND ", $this->prepareColumnsNValues($conditions, 0));
      $SQLstatement = "DELETE FROM $tableName WHERE $preparedConditions";

      return $this->query($SQLstatement);
   }

   // update('customers', ['fName' => 'Binuka', 'lName' => 'Karunarathne'], ['mobileNo' => '0712334567', 'gender' => 'M']);
   public function update($tableName, $values, $conditions)
   {
      $preparedValues = implode(", ", $this->prepareColumnsNValues($values, 0));
      $preparedConditions = implode(" AND ", $this->prepareColumnsNValues($conditions, 0));
      $SQLstatement = "UPDATE $tableName SET $preparedValues WHERE $preparedConditions";
      return $this->query($SQLstatement);
   }

   // customQuery("SELECT DISTINCT type FROM services")
   public function customQuery($SQLstatement, $dataToBind = null)
   {
      $this->dataToBind = $dataToBind;
      $queryType = strtoupper(explode(" ", $SQLstatement, 2)[0]);
      if ($queryType === "SELECT")
      {
         $this->query($SQLstatement);
         $result = $this->PDOstatement->fetchAll(PDO::FETCH_OBJ);
         return $result;
      }
      else
      {
         return $this->query($SQLstatement);
      }
   }

}

