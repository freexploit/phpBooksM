<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Mi propio registro de marcadores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
      .form 
      {
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <script src="js/jquery.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    <script type="text/javascript">
     $(document).ready(function(){
     function ver()
     {
        $.getJSON("ver.php",{what:"all"},
	    function (data)
	    {
		 var regex=/^(ht|f)tps?:\/\/\w+([\.\-\w]+)?\.([a-z]{2,4}|travel)(:\d{2,5})?(\/.*)?$/i;
	         var table="<table class='table' >";
		     table+="<thead><tr><th>#</th><th>Nombre</th><th>URL</th><th>Comentario</th></tr></thead><tbody>";
	         for (var c =0;c<data.length;c++)
		 {
		    var obj = data[c];
		    table+="<tr id='"+data[c].id+"'>";
		    for (var property in obj)
		    {
		         if(regex.test(obj[property]))
			 {
			    table+="<td><a href='"+obj[property]+"' >"+obj[property]+"</a></td>";
			 }
			 else
			 {
                             table+="<td><p>"+obj[property]+"</p></td>";
			 }     
		    }
		    table+="</tr>"

		    
		 }
		 table+="</tbody></table>";
		 $("#output").html(table);
	    }
	); 
	}
        
	 ver();
	 $("#output p").dblclick(
	   function()
	   {
	   alert("waaaa");
	   }
	
	);
        $("#modalWindow").modal("hide");
        $("#guardar").click(
	   function(){
	      $.post("guardar.php",$("#addBookmark").serialize(),function(r){
	          $("#modalWindow .modal-body p").html(r);
		  $("#modalWindow").modal('show');
		  $("#addBookmark input").val("");
		  $("#addBookmark textarea").val("");
		  ver();
	      });
	   });
	$(".dropdown-toggle").dropdown();   
	 });
    </script>
  </head>

  <body>
  

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">PHPmyBooksMark</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#">Nuevo Marcador</a></li>
              <li><a href="#about">Lista marcadores</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
         <div class="row-fluid">
	       <div class="span4">
	       <div class="well form">
	       <form  id="addBookmark">
                         <fieldset>
                               <legend>Ingresa el marcador</legend>
                                   <div class="control-group">
                                        <label class="control-label" for="nombre">Nombre</label>
                                        <div class="controls">
                                             <input type="text" class="input-xlarge" id="nombre" name="nombre">
                                             <p class="help-block">Aqui ingresa el nombre del marcador</p>
                                         </div>
                                    </div>
                                    <div class="control-group">
                                         <label class="control-label" for="URL">URL</label>
                                         <div class="controls">
                                             <input type="text" class="input-xlarge" id="URl" name="URL">
                                             <p class="help-block">Aqui ingresa la URL</p><br />
                                         </div>
                                         <div class="control-group">
                                              <label class="control-label" for="comentario">Comentario</label>
                                              <div class="controls">
                                                   <textarea  class="input-xlarge" id="comentario" name="comentario"></textarea>
                                                    <p class="help-block">Comentario del link</p>
                                              </div>
                                         </div>
	                   </fieldset>
                    </form> 
                    <button class="btn btn-primary"  id="guardar">Guardar</button>
                 </div>

	       </div>
	      
	               <div class="span8">
		             <div class="showBookmark">
                                  <ul class="nav nav-pills">
                                       <li class="dropdown">
                                            <a class="btn  dropdown-toggle" data-toggle="dropdown" href="#">Opciones <b class="caret"></b></a>
                                           <ul id="opciones" class="dropdown-menu">
                                               <li><a href="#">Ver</a></li>
                                               <li><a href="#">Buscar</a></li>
                                               <li><a href="#">Eliminar</a></li>
                                               <li class="divider"></li>
                                               <li><a href="#">Etiquetar</a></li>
                                          </ul> 
                                       </li>
                                  </ul> 
                                 <div id="output">
				   
				 </div> 
			     </div>
		       </div>

	 </div> 
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
         
        <script src="./js/bootstrap.js"></script>
        <script src="./js/bootstrap-transition.js"></script>
        <script src="./js/bootstrap-alert.js"></script>
        <script src="./js/bootstrap-modal.js"></script>

        <script src="./js/bootstrap-dropdown.js"></script>
        <script src="./js/bootstrap-scrollspy.js"></script>
        <script src="./js/bootstrap-tab.js"></script>
        <script src="./js/bootstrap-tooltip.js"></script>
       <script src="./js/bootstrap-popover.js"></script>
       <script src="./js/bootstrap-button.js"></script>

       <script src="./js/bootstrap-collapse.js"></script>
       <script src="./js/bootstrap-carousel.js"></script>
       <script src="./js/bootstrap-typeahead.js"></script>
	
<div class="modal hide fade" id="modalWindow">
        <div class="modal-header">
	     <h3>Mensajes :D</h3>
	     <a  class="close" data-dismiss="modal">x</a>
	</div> 
	<div class="modal-body">
             <p></p>	
	</div>
	<div class="modal-footer" >
            <a  class="btn" data-dismiss="modal" href="#">Cerrar</a>	
	</div>
    </div>

  </body>
</html>
