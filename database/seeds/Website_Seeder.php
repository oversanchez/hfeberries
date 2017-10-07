<?php

use Illuminate\Database\Seeder;

class Website_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slider')->insert([
            ["orden" => 1,"url_vinculo"=>"#","nombre_vinculo"=>"","nombre" => "Entrada Principal","url_foto"=> "/royal/img/rosario/slider1.jpg","publico"=> true],
            ["orden" => 2,"url_vinculo"=>"#","nombre_vinculo"=>"","nombre" => "Formación General","url_foto"=> "/royal/img/rosario/slider2.jpg","publico"=> true],
            ["orden" => 3,"url_vinculo"=>"#","nombre_vinculo"=>"","nombre" => "Cerca de Dios","url_foto"=> "/royal/img/rosario/slider3.jpg","publico"=> true],
            ["orden" => 4,"url_vinculo"=>"#","nombre_vinculo"=>"","nombre" => "Pabellón","url_foto"=> "/royal/img/rosario/slider4.jpg","publico"=> true],
        ]);

        DB::table('noticia')->insert([
            ["nombre" => "Trump visitará estos países en su primer viaje al exterior","fecha"=>"2017-05-06","descripcion"=>"El presidente de Estados Unidos iniciará su gira a fines de mayo. También asistirá a dos importantes cumbres","url_foto"=> "http://cde.3.elcomercio.pe/ima/0/1/6/7/9/1679737/base_image.jpg","publico"=> true],
            ["nombre" => "Así es el misil intercontinental que probó EE.UU","fecha"=>"2017-05-14","descripcion"=>"El proyectil, capaz de llevar una ojiva nuclear, viajó unos 6.700 km sobre el Océano Pacífico y cayó en las Islas Marshall","url_foto"=> "https://cdnmundo2.img.sputniknews.com/images/105322/53/1053225389.jpg","publico"=> true],
            ["nombre" => "¿Qué hará China si atacan a su socio Corea del Norte?","fecha"=>"2017-05-02","descripcion"=>"Estos dos países son tan cercanos como los labios y los dientes, dijo alguna vez el máximo dirigente chino Mao Tse tung","url_foto"=> "http://cde.3.elcomercio.pe/ima/0/1/6/7/9/1679795/base_image.jpg","publico"=> true],
            ["nombre" => "Caso Odebrecht: correos revelan discrepancias por gasoducto","fecha"=>"2017-05-08","descripcion"=>"Comunicaciones a Castilla dan cuenta de frustrados intentos para que Odebrecht no quedara como único postor de gasoducto","url_foto"=> "http://cde.3.elcomercio.pe/ima/0/1/5/8/5/1585631/base_image.jpg","publico"=> true],
        ]);

        DB::table('evento')->insert([
            ["nombre" => "Día de la Madre 2017","fecha"=>"2017-05-14","hora"=>"9:00 a.m.","lugar"=>"Colegio Rosario","descripcion"=>"El Día de la Madre o Día de las Madres es una festividad que se celebra en honor a las madres en todo el mundo, en diferentes fechas del año según el país","publico"=>true],
            ["nombre" => "Día de la Padre 2017","fecha"=>"2017-06-14","hora"=>"9:00 a.m.","lugar"=>"Colegio Rosario","descripcion"=>"El día del Padre o día de los Padres es un día conmemorativo en el cual se celebra al padre dentro de la familia con la intención de reconocer la paternidad responsable y amorosa","publico"=>true],
            ["nombre" => "Día del Trabajo","fecha"=>"2017-07-14","hora"=>"9:00 a.m.","lugar"=>"Colegio Rosario","descripcion"=>"El Primero de Mayo se celebra el Día del Trabajo en honor a todos los hombres y mujeres que con su labor diaria buscan un mejor futuro y hacer crecer a la sociedad.","publico"=>true],
            ["nombre" => "Día de la Madre 2017","fecha"=>"2017-05-24","hora"=>"9:00 a.m.","lugar"=>"Colegio Rosario","descripcion"=>"El Día de la Madre o Día de las Madres es una festividad que se celebra en honor a las madres en todo el mundo, en diferentes fechas del año según el país","publico"=>true],
            ["nombre" => "Día de la Padre 2017","fecha"=>"2017-05-12","hora"=>"9:00 a.m.","lugar"=>"Colegio Rosario","descripcion"=>"El día del Padre o día de los Padres es un día conmemorativo en el cual se celebra al padre dentro de la familia con la intención de reconocer la paternidad responsable y amorosa","publico"=>true],
            ["nombre" => "Día del Trabajo","fecha"=>"2017-05-14","hora"=>"9:00 a.m.","lugar"=>"Colegio Rosario","descripcion"=>"El Primero de Mayo se celebra el Día del Trabajo en honor a todos los hombres y mujeres que con su labor diaria buscan un mejor futuro y hacer crecer a la sociedad.","publico"=>true],
            ["nombre" => "Día de la Madre 2017","fecha"=>"2017-05-14","hora"=>"9:00 a.m.","lugar"=>"Colegio Rosario","descripcion"=>"El Día de la Madre o Día de las Madres es una festividad que se celebra en honor a las madres en todo el mundo, en diferentes fechas del año según el país","publico"=>true],
            ["nombre" => "Día de la Padre 2017","fecha"=>"2017-05-14","hora"=>"9:00 a.m.","lugar"=>"Colegio Rosario","descripcion"=>"El día del Padre o día de los Padres es un día conmemorativo en el cual se celebra al padre dentro de la familia con la intención de reconocer la paternidad responsable y amorosa","publico"=>true],
            ["nombre" => "Día del Trabajo","fecha"=>"2017-05-14","hora"=>"9:00 a.m.","lugar"=>"Colegio Rosario","descripcion"=>"El Primero de Mayo se celebra el Día del Trabajo en honor a todos los hombres y mujeres que con su labor diaria buscan un mejor futuro y hacer crecer a la sociedad.","publico"=>true]
        ]);

        DB::table('enlace_rapido')->insert([
            ["nombre" => "Comunicado Nº 1023 : Agradecimiento a Padres de familia","url"=>"#","categoria"=>"CO","orden"=>0,"color"=>"","publico"=>true],
            ["nombre" => "Comunicado Nº 1030 : Premiacion de estudiantes","url"=>"#","categoria"=>"CO","orden"=>0,"color"=>"red","publico"=>true],
            ["nombre" => "Comunicado Nº 1031 : Calendarización 2017","url"=>"#","categoria"=>"CO","orden"=>0,"color"=>"","publico"=>true],

            ["nombre" => "Lista de primeros puestos","url"=>"#","categoria"=>"DO","orden"=>0,"color"=>"black","publico"=>true],
            ["nombre" => "Ficha de Matricula 2017","url"=>"#","categoria"=>"DO","orden"=>0,"color"=>"green","publico"=>true],

            ["nombre" => "App Android Rosarina","url"=>"#","categoria"=>"DE","orden"=>0,"color"=>"chocolate","publico"=>true],
        ]);

        DB::table('opcion_menu')->insert([
            ["orden"=>1,"nombre" => "INICIO","url"=>"/","opcion_superior_id"=>null,"tipo"=>"L","publico"=>true,"nro_opciones"=>0],
            ["orden"=>2,"nombre" => "FILOSOFÍA INSTITUCIONAL","url"=>"#","opcion_superior_id"=>null,"tipo"=>"L","publico"=>true,"nro_opciones"=>5],
            ["orden"=>3,"nombre" => "INFRAESTRUCTURA","url"=>"#","opcion_superior_id"=>null,"tipo"=>"L","publico"=>true,"nro_opciones"=>0],
            ["orden"=>4,"nombre" => "ÁREA DE FORMACIÓN","url"=>"#","opcion_superior_id"=>null,"tipo"=>"L","publico"=>true,"nro_opciones"=>0],
            ["orden"=>5,"nombre" => "ACTUALIDAD","url"=>"#","opcion_superior_id"=>null,"tipo"=>"B","publico"=>true,"nro_opciones"=>0],

            ["orden"=>1,"nombre" => "Reseña Histórica","url"=>"#","opcion_superior_id"=>2,"tipo"=>"L","publico"=>true,"nro_opciones"=>1],
            ["orden"=>2,"nombre" => "Misión y Visión","url"=>"#","opcion_superior_id"=>2,"tipo"=>"L","publico"=>true,"nro_opciones"=>0],
            ["orden"=>4,"nombre" => "Perfiles","url"=>"#","opcion_superior_id"=>2,"tipo"=>"L","publico"=>true,"nro_opciones"=>0],
            ["orden"=>3,"nombre" => "Valores Institucionales","url"=>"#","opcion_superior_id"=>2,"tipo"=>"L","publico"=>true,"nro_opciones"=>0],
            ["orden"=>5,"nombre" => "Himno al colegio","url"=>"#","opcion_superior_id"=>2,"tipo"=>"L","publico"=>true,"nro_opciones"=>0],

            ["orden"=>1,"nombre" => "Sub Opcion 1","url"=>"#","opcion_superior_id"=>7,"tipo"=>"L","publico"=>true,"nro_opciones"=>0],
        ]);

        DB::table('testimonio')->insert([
            ["nombres" => "Milagros Takayama","url_foto"=>"http://aplicaciones004.jne.gob.pe/PADRON/13/01/01/083940/16787889.jpg","ocupacion" => "Congresista","empresa" => "Congreso","descripcion"=>"I’m very happy interdum eget ipsum. Nunc pulvinar ut nulla eget sollicitudin. In hac habitasse platea dictumst. Integer mattis varius ipsum, posuere posuere est porta vel. Integer metus ligula, blandit ut fermentum a, rhoncus in ligula. Duis luctus.. Integer metus ligula, blandit ut fermentum a, rhoncus in ligula. Duis luctus."],
            ["nombres" => "Oliver Sánchez","url_foto"=>"http://www.stm.edu.pe/2016/assets/images/tics/oliver%20sanchez.jpg","ocupacion" => "Analista Programador","empresa" => "Biosis","descripcion"=>"I’m very happy interdum eget ipsum. Nunc pulvinar ut nulla eget sollicitudin. In hac habitasse platea dictumst. Integer mattis varius ipsum, posuere posuere est porta vel. Integer metus ligula, blandit ut fermentum a, rhoncus in ligula. Duis luctus.. Integer metus ligula, blandit ut fermentum a, rhoncus in ligula. Duis luctus."],
        ]);

        DB::table('opcion_footer')->insert([
            ["nombre" => "Contáctanos","url"=>"#","footer"=>true],
            ["nombre" => "Políticas de Privacidad","url"=>"#","footer"=>true],
            ["nombre" => "Acerca de nuestro colegio","url"=>"#","footer"=>false],
            ["nombre" => "Nuestros Profesores","url"=>"#","footer"=>false],
            ["nombre" => "Por qué elegirnos","url"=>"#","footer"=>false],
        ]);

        DB::table('emergente')->insert([
            ["nombre" => "Emergente 3","tipo"=>"I","fecha"=>"18/05/2017","contenido"=>"","url_foto"=>"https://scontent.flim1-1.fna.fbcdn.net/v/t1.0-9/16114665_131603514012370_2029188717186072621_n.jpg?oh=eb705ba496e99f17e3a6ec9eacf4ee10&oe=59C19379","url"=>"#","publico"=>true],
            ["nombre" => "Emergente 2","tipo"=>"P","fecha"=>"18/05/2017","contenido"=>"Informacion relacionada","url_foto"=>"#","url"=>"#","publico"=>false],
            ["nombre" => "Emergente 1","tipo"=>"L","fecha"=>"18/05/2017","contenido"=>"Informacion relacionada","url_foto"=>"#","url"=>"#","publico"=>false],
        ]);

        DB::table('video')->insert([
            ["nombre" => "Bienvenida a Nuestra Señora del Rosario","fecha"=>"2017-05-14","frame"=>"<iframe src=\"https://player.vimeo.com/video/216732031?title=0&byline=0&portrait=0\" style='width: 100%;height: auto;' frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>","publico"=>true],
            ["nombre" => "Bienvenida a Nuestra Señora del Rosario","fecha"=>"2017-05-14","frame"=>"<iframe src=\"https://player.vimeo.com/video/216732031?title=0&byline=0&portrait=0\" style='width: 100%;height: auto;' frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>","publico"=>true],
            ["nombre" => "Bienvenida a Nuestra Señora del Rosario","fecha"=>"2017-05-14","frame"=>"<iframe src=\"https://player.vimeo.com/video/216732031?title=0&byline=0&portrait=0\" style='width: 100%;height: auto;' frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>","publico"=>true],
            ["nombre" => "Bienvenida a Nuestra Señora del Rosario","fecha"=>"2017-05-14","frame"=>"<iframe src=\"https://player.vimeo.com/video/216732031?title=0&byline=0&portrait=0\" style='width: 100%;height: auto;' frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>","publico"=>true],
        ]);


        DB::table('institucion')->insert([
            ["telefonos" => "956748752","direccion"=>"Av. Manuel Gutierrez 123","correo"=>"ierosario@gmail.com","ciudad"=>"Chiclayo","bienvenida_texto"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean consectetur ante volutpat sem aliquam lobortis..","bienvenida_url"=>"#","link_mapa"=>'<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2801.4840647288756!2d-79.83833504933094!3d-6.782417475892645!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x904cef2e004abf9d%3A0x9156a7ec54a399e4!2sI.E.+Nuestra+Se%C3%B1ora+del+Rosario!5e0!3m2!1ses-419!2ses!4v1494949452387" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>'],
        ]);


    }
}
