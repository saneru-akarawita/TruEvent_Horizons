<script>

            $(document).ready(function() {

                var calendar = $('#calendar').fullCalendar({
//------------------------- fetch event start----------------------------------------------//
                    editable:true, /* */
                    header:{      /* */
                        left:'prev,next today',
                        center:'title'
                    },
                    events: [
                        <?php foreach($data as $eventdata) :?>
                             <?= '{'?>
                                id: <?= $eventdata->id?>,
                                title: <?= '"'.$eventdata->title.'"'?>,
                                start: <?= '"'.$eventdata->start.'"'?>,
                                end: <?= '"'.$eventdata->end.'"'?>,
                                color: "red",
                                textColor: "white"
                            <?='},'?> 
                        <?php endforeach; ?>
                            ],
//------------------------- fetch event end----------------------------------------------//
                });
            });

</script>