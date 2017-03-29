<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        <script src="js/jquery-1.12.1.js" type="text/javascript"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=ca"></script>
        <script src="gmap3.min.js" type="text/javascript"></script>
        
        <title></title>
    </head>
    <body>
        <?php
        $direccion = $_GET["direccion"];
        echo $direccion;
        ?>
        <div id="mapa2" style="width: 300px; height:300px;"></div>
        <script>
            $(document).ready(init);
            function init() {
                $('#mapa2').gmap3(
                        {map: {
                                options: {
                                    zoom: 5
                                }
                            },
                            marker: {
                                values: [
                                    {address: "<?php echo $direccion ?>"
                                        , data: "<h3>Titulo</h3><div><?php echo $direccion ?></div>"
                                    }
                                ],
                                //podem definir una serie de events sobre les marques
                                events: {
                                    //Al clicar obrim una finestra sobre la marca i hi insertem el data de la marca
                                    click: function (marker, event, context) {
                                        var map = $(this).gmap3("get"), infowindow = $(this).gmap3({get: {name: "infowindow"}}); //obtenim el mapa

                                        if (infowindow) {
                                            infowindow.open(map, marker);   //obrim la marca
                                            infowindow.setContent(context.data);    //dins la finestra mostrem el atribut data de la marca
                                        } else {
                                            $(this).gmap3({
                                                infowindow: {//alternativa a la acció anterior
                                                    anchor: marker,
                                                    options: {content: context.data}
                                                }
                                            });
                                        }
                                    }
                                }
                             }, autofit:{}
                        }
                );
            }
        </script>
    </body>
</html>
