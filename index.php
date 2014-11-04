<!--****Calendrier Calendrier en php HTML5 CSS3 JQUERY
********Created on : 3 nov. 2014, 11:42:17
********Author     : sebastien
-->

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <title>Calendrier</title>
        <link   rel="stylesheet" type="text/css" href="style.css" />
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script type="text/javascript">
            //Script d'effet de slide entre les mois du calendrier
            jQuery(function ($) {
                var date = new Date();
                var current = date.getMonth() + 1;
                $('.month').hide();
                $('#month' + current).show();
                $('.months a#linkMonth' + current).addClass('active');
                $('.months a').click(function () {
                    var month = $(this).attr('id').replace('linkMonth', '');
                    if (month != current) {
                        $('#month' + current).slideUp();
                        $('#month' + month).slideDown();
                        $('.months a').removeClass('active');
                        $('.months a#linkMonth' + month).addClass('active');
                        current = month;
                    }
                    return false;
                });
            });
        </script>


    </head>
    <body>
        <?php
        require('date.php');
        
        $date = new Date();
        $year = date('Y');
        $dates = $date->getAll($year);
        ?>
        <div class="period">
            <div class="year"> <?php echo $year ?> </div>
            <div class="months">
                <ul>
                    <?php foreach ($date->months as $id => $m): ?>
                        <li><a href="#" id="linkMonth<?php echo $id + 1; ?>"><?php echo utf8_encode(substr(utf8_decode($m), 0, 3)); ?></a></li>

                    <?php endforeach; ?>

                </ul>
            </div>
            <div class="clear"></div>
            <?php $dates = current($dates); ?>
            
            <!-- debut de boule de fiche de mois -->
            <?php foreach ($dates as $m => $days): ?>
                <div class="month relative" id="month<?php echo $m; ?>">
                    <table>
                        <thead>
                            <tr>
                                <?php foreach ($date->days as $d): ?>
                                    <th>
                                        <?php echo substr($d, 0, 3); ?>
                                    </th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $end = end($days);
                                foreach ($days as $d => $w):
                                    if ($d == 1 and $w != 1):
                                        ?>
                                        <td colspan="<?php echo $w - 1; ?>" class="padding"> </td>

                                    <?php endif; ?>
                                <td>
                                <div class="relative">
                                    <div class="day">
                                    <?php echo $d; ?>
                                    </div>
                                </div>


                                </td>
                                <?php if ($w == 7): ?>
                                </tr>
                                <tr>
                                <?php endif; ?>

                                <?php endforeach; ?>
                                <?php if ($end != 7): ?>
                                <td colspan="<?php 7 - $end; ?>" class="padding"> </td>
                                <?php endif; ?>
                                </tr>

                        </tbody>
                    </table>
                </div>

            <?php endforeach; ?>
        </div>
    </body>
</html>

