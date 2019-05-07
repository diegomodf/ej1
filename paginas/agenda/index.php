<?php
  require_once('../../sistema/php/conectaBd/index.php');
  
  $objDb = new db();
  $link = $objDb->conecta_mysql();
  $edita_agenda = 1;
  $result_events = "SELECT * FROM consultas";
  $resultado_events = mysqli_query($link, $result_events);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include '../Html/head.php';?>
  <link rel="stylesheet" href="../../sistema/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../sistema/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../sistema/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../sistema/adminlte/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../sistema/adminlte/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="../../sistema/adminlte/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
  <link rel="stylesheet" href="../../sistema/adminlte/bower_components/fullcalendar/dist/locale/pt-br.js">
  <link rel="stylesheet" href="../../sistema/adminlte/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../../sistema/css/agenda/agenda.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  
  <style type="text/css">
      .carregando{
        color:#ff0000;
        display:none;
      }

      .carrega{
        color:#ff0000;
        display:none;
      }

  </style>

  <script>
    function formatar(mascara, documento){
      var i = documento.value.length;
      var saida = mascara.substring(0,1);
      var texto = mascara.substring(i)
      
      if (texto.substring(0,1) != saida){
                documento.value += texto.substring(0,1);
      }
      
    }
</script>
</head>

<body class="hold-transition skin-purple sidebar-mini">

<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

  <!-- Cabeçalho da página -->
     <!-- Logo -->
    <a href="../usuario" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>F</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Cli<b>Fops</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only"></span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../../sistema/adminlte/dist/img/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../../sistema/adminlte/dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  <small>Sistema Clifops</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="alterar.php" class="btn btn-default btn-flat">Alterar Senha</a>
                </div>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="sair.php" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../sistema/adminlte/dist/img/avatar5.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU</li>
      <li><a href="../../paginas/menu/menuPrincipal/principal/index.php"><i class="fa fa-play"></i> <span>Início</span></a></li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href=""><i class="fa fa-calendar"></i> <span>Agenda</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-user-plus"></i> <span>Cadastro</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="../menu/menuCadastro/paciente/index.php">Paciente</a></li>
          <li><a href="../menu/menuCadastro/terapeuta/index.php">Terapeuta</a></li>
          <li><a href="../menu/menuCadastro/convenio/">Convênio</a></li>
          <li><a href="../menu/MenuCadastro/funcionario/">Funcionário</a></li>
          <li><a href="../menu/menuCadastro/valores/">Valores</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-list"></i> <span>Guias</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="../menu/menuCadastro/guias/index.php">Cadastro</a></li>
          <li><a href="../menu/menuBusca/guias/">Busca</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-money"></i> <span>Controle</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="../menu/menuBusca/uploads/">Uploads</a></li>
          <li><a href="../menu/menuBusca/pagamentos/">Pagamentos</a></li>
          <li><a href="../menu/menuBusca/lotes/">Lotes</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-cogs"></i> <span>Configurações</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
        <ul class="treeview-menu">
          <li><a href="../menu/menuBusca/paciente/">Paciente</a></li>
          <li><a href="../menu/menuBusca/terapeuta">Terapeuta</a></li>
          <li><a href="../menu/menuBusca/convenio">Convênio</a></li>
          <li><a href="../menu/menuBusca/funcionario">Funcionário</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Consultas Agendadas
        <small>Gerencie os Horários</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendar</li>
      </ol>
    </section>

      <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Legenda</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
                <div class="bloco legenda1" style="background-color: #DCDCDC;">Indisponível</div>
                <div class="bloco legenda2">Consulta e Avaliação</div>
                <div class="bloco legenda3">Agendamento Fixo</div>
                <div class="bloco legenda4">Agendamento Não Fixo</div>
                <div class="bloco legenda5">Realizada</div>
                <div class="bloco legenda6">Não Realizada</div>
                <div class="bloco legenda7">Falta com Aviso</div>
                <div class="bloco legenda8">Falta Avisada no Dia</div>
                <div class="bloco legenda9">Consulta não Realizada</div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>

        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


  <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-center">Dados do Evento</h4>
            </div>
            <div class="modal-body">
              <div class=form>
                <form class="form-horizontal" method="POST" action="agenda/editaagenda.php">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="title" placeholder="Titulo do Evento" id="title">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Cor</label>
                    <div class="col-sm-10">
                        <select name="color" class="form-control" id="color">
                        <option value="">Selecione</option>
                        <option value="#DCDCDC">Indisponível</option>
                        <option value="#FF6347">Consulta e Avaliação</option>
                        <option value="#00FFFF">Agendamento Fixo</option>
                        <option value="#EE82EE">Agendamento Não Fixo</option>
                        <option value="#32CD32">Realizada</option>
                        <option value="#FA8072">Não Realizada</option>
                        <option value="#FFD700">Falta com Aviso</option>
                        <option value="#FFA500">Falta com Aviso no Dia</option>
                        <option value="#87CEFA">Consulta Não Realizada</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Data Final</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
                    </div>
                  </div>
                  <input type="hidden" class="form-control" name="id" id="id">
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Salvar Alterações</button>
                      <button type="button" class="btn btn-canc-form btn-danger">Cancelar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="visualizar2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title text-center">Dados do Evento</h4>
                </div>
                <div class="modal-body">
                  <div class="visualizar">
                    <dl class="dl-horizontal">
                      <dt>Titulo do Evento</dt>
                      <dd id="title"></dd>
                      <dt>Inicio do Evento</dt>
                      <dd id="start"></dd>
                      <dt>Fim do Evento</dt>
                      <dd id="end"></dd>
                    </dl>
                  </div>
                </div>
              </div>
            </div>
          </div>

      <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">Marcar Consulta</h4>
          </div>
          <div class="modal-body">
          <form action="../../sistema/php/apresentaDados/agenda/insert.php" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label>CPF</label>
              <input type="text" name="cpf" class="form-control" placeholder="CPF" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14" required>
            </div>
            <div>
              <label>Nome do Paciente</label>
              <input type="text" name="nome" class="form-control" placeholder="Nome do Paciente" required>
            </div>
            <br>
            <div class="form-group">
              <label>Telefone</label>
              <input type="text" name="telefone" class="form-control" placeholder="Telefone" OnKeyPress="formatar('##-#####-####', this)" maxlength="13" required>
            </div>
            <div class="form-group">
              <label>Nome do Responsável</label>
              <input name="responsavel" class="form-control" rows="3" placeholder="Nome do Responsável">
            </div>
            <div class="form-group">
              <label>CPF do Responsávl</label>
              <input type="text" name="cpf_res" class="form-control" placeholder="CPF do Responsávl" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input name="email" class="form-control" rows="3" placeholder="Email" required>
            </div>
            <div class="form-group">
            <label>Especialidade</label>
              <select class="form-control" name="id_categoria" id="id_categoria" required>
                <option value="">Selecione...</option>
                  <?php 
                    require_once('../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = " SELECT * FROM especialidade";
                    $resultado_ids = mysqli_query($link, $sql);
                    if($resultado_ids){
                    while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                    echo '<option value="'.$registros['idespecialidade'].'">'.$registros['especialidade'].'</option>';
                      }
                    }else{
                      echo 'Erro na consulta dos emails no banco de dados!';
                    }
                  ?>
              </select>
            </div>
            <div class="form-group">
            <label>Nome do Terapeuta</label>
              <span class="carregando">Aguarde, carregando...</span>
              <select class="form-control" name="id_sub_categoria" id="id_sub_categoria" required>
                <option value="">Escolha a Subcategoria</option>
              </select>
            </div>
            <div class="form-group">
              <label>Data Inicial</label>
              <input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)" required>
            </div>
            <div class="form-group">
              <label>Data Final</label>
              <input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)" required>
            </div>
            <div class="form-group">
              <label>Repetição</label>
              <input name="repeticao" class="form-control" rows="3" placeholder="Repetição" required>
            </div>
            <div class="form-group">
                <label>Atendimento</label>
                <select name="color" class="form-control" id="color">
                  <option value="">Selecione</option>
                  <option value="#DCDCDC">Indisponível</option>
                  <option value="#FF6347">Consulta e Avaliação</option>
                  <option value="#00FFFF">Agendamento Fixo</option>
                  <option value="#EE82EE">Agendamento Não Fixo</option>
                  <option value="#32CD32">Realizada</option>
                  <option value="#FA8072">Não Realizada</option>
                  <option value="#FFD700">Falta com Aviso</option>
                  <option value="#FFA500">Falta com Aviso no Dia</option>
                  <option value="#87CEFA">Consulta Não Realizada</option>
                </select>
            </div>
            <div class="form-group">
            <label>Operadora</label>
              <select class="form-control" name="id_operadora" id="id_operadora" required>
                <option value="">Selecione...</option>
                  <?php 
                    require_once('../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = " SELECT * FROM operadora";
                    $resultado = mysqli_query($link, $sql);
                    if($resultado){
                    while($registro = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                    echo '<option value="'.$registro['idoperadora'].'">'.$registro['nome'].'</option>';
                      }
                    }else{
                      echo 'Erro na consulta dos emails no banco de dados!';
                    }
                  ?>
              </select>
            </div>
            <div class="form-group">
            <label>Procedimento</label>
              <span class="carrega">Aguarde, carregando...</span>
              <select class="form-control" name="id_valor" id="id_valor" required>
                <option value="">Escolha o Procedimento</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Publicar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </div>
      </form>
          </div>
        </div>
      </div>
    </div>
    <div id="ModalApagar" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Apagar Evento</h4>
          </div>
          <form action="agenda/apagaragenda.php" method="POST" enctype="multipart/form-data"> <!--faz o post para o arquivo php-->
            <div class="modal-body">
              <label>Tem certeza que quer apagar o evento?</label>
              <div class="modal-footer">
              <input type="hidden" class="form-control" name="id" id="id">
              <button type="submit" class="btn btn-danger">Apagar</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              </div>
            </div>
        </form>
        </div>
      </div>
    </div>
  <!-- Main Footer -->
  <footer class="main-footer">

      <!-- Rodapé da pagina -->
      <!-- To the right -->
    <div class="pull-right hidden-xs">
      EngNet Consultoria e Implementação
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="../../index.php">CliFops</a>.</strong> Todos os Direitos Reservados.

  </footer>


</div>

<!-- ./wrapper -->

<script src="../../sistema/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../sistema/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../sistema/adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="../../sistema/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../sistema/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../sistema/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../sistema/adminlte/dist/js/demo.js"></script>
<!-- fullCalendar -->
<script src="../../sistema/adminlte/bower_components/moment/moment.js"></script>
<script src="../../sistema/adminlte/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="../../sistema/adminlte/bower_components/fullcalendar/dist/locale/pt-br.js"></script>

<!-- Page specific script -->

<script>
  $(function () {
    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {
        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }
        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)
        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })
      })
    }
    init_events($('#external-events div.external-event'))
    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    <?php if(($edita_agenda) == '1'){ ?>
    $('#calendar').fullCalendar({
      header  : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'hoje',
        month: 'mês',
        week : 'semana',
        day  : 'dia'
      },
      //Random default events
      events    : [
        {/* EXEMPLO DE EVENTO
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954' //red
        */},
      ],
      eventLimit: true,
      selectable: true,
      //navLinks: true, // can click day/week names to navigate views
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      eventClick: function(event) {
           $('#visualizar #title').text(event.title);
           $('#visualizar #id').text(event.id);
           $('#visualizar #id').val(event.id);
           $('#ModalApagar #id').text(event.id);
           $('#ModalApagar #id').val(event.id);
           $('#visualizar #title').val(event.title);
           $('#visualizar #color').val(event.color);
           $('#visualizar #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
           $('#visualizar #start').val(event.start.format('DD/MM/YYYY HH:mm:ss'));
           $('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));
           $('#visualizar #end').val(event.end.format('DD/MM/YYYY HH:mm:ss'));
           $('#visualizar').modal('show');
           return false;
      },
      selectHelper: true,
      select: function(start, end){
           $('#cadastrar #start').val(moment(start).format('DD/MM/YYYY HH:mm:ss'));
           $('#cadastrar #end').val(moment(end).format('DD/MM/YYYY HH:mm:ss'));
           $('#cadastrar').modal('show');
      },
      droppable : true, // this allows things to be dropped onto the calendar !!!
      /*drop      : function (date, allDay) { // this function is called when something is dropped
        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')
        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)
        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')
        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)
        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }
      }*/
      events: [
            <?php
              while($row_events = mysqli_fetch_array($resultado_events)){
                ?>
                {
                id: '<?php echo $row_events['idconsultas']; ?>',
                title: '<?php echo $row_events['nome_paciente']; ?>',
                telefone: '<?php echo $row_events['telefone']; ?>',
                start: '<?php echo $row_events['inicio']; ?>',
                end: '<?php echo $row_events['termino']; ?>',
                color: '<?php echo $row_events['status_consulta']; ?>',
                },<?php
              }
            ?>
          ]
    })
    <?php
 }
 else {
 ?>
 $('#calendar').fullCalendar({
   header  : {
     left  : 'prev,next today',
     center: 'title',
     right : 'month,agendaWeek,agendaDay'
   },
   buttonText: {
     today: 'hoje',
     month: 'mês',
     week : 'semana',
     day  : 'dia'
   },
   //Random default events
   events    : [
     {/* EXEMPLO DE EVENTO
       title          : 'All Day Event',
       start          : new Date(y, m, 1),
       backgroundColor: '#f56954', //red
       borderColor    : '#f56954' //red
     */},
   ],
   eventLimit: true,
   selectable: true,
   //navLinks: true, // can click day/week names to navigate views
   editable: false,
   eventLimit: true, // allow "more" link when too many events
   eventClick: function(event) {
        $('#visualizar2 #title').text(event.title);
        $('#visualizar2 #id').text(event.id);
        $('#visualizar2 #id').val(event.id);
        $('#visualizar2 #title').val(event.title);
        $('#visualizar2 #color').val(event.color);
        $('#visualizar2 #start').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
        $('#visualizar2 #start').val(event.start.format('DD/MM/YYYY HH:mm:ss'));
        $('#visualizar2 #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));
        $('#visualizar2 #end').val(event.end.format('DD/MM/YYYY HH:mm:ss'));
        $('#visualizar2').modal('show');
        return false;
   },
   selectHelper: true,
   events: [
         <?php
           while($row_events = mysqli_fetch_array($resultado_events)){
             ?>
             {
             id: '<?php echo $row_events['idconsultas']; ?>',
                title: '<?php echo $row_events['nome_paciente']; ?>',
                telefone: '<?php echo $row_events['telefone']; ?>',
                start: '<?php echo $row_events['inicio']; ?>',
                end: '<?php echo $row_events['termino']; ?>',
                color: '<?php echo $row_events['status_consulta']; ?>',
             },<?php
           }
         ?>
       ]
 })
 <?php
 }
 ?>
    $('.btn-canc-vis').on("click", function(){
      $('.form').slideToggle();
      $('.visualizar').slideToggle();
    });
    $('.btn-canc-form').on("click", function(){
      $('.visualizar').slideToggle();
      $('.form').slideToggle();
    });
    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }
      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)
      //Add draggable funtionality
      init_events(event)
      //Remove event from text input
      $('#new-event').val('')
    })
  })
    //Mascara para o campo data e hora
    function DataHora(evento, objeto){
        var keypress=(window.event)?event.keyCode:evento.which;
        campo = eval (objeto);
          if (campo.value == '00/00/0000 00:00:00'){
            campo.value=""
          }
          caracteres = '0123456789';
          separacao1 = '/';
          separacao2 = ' ';
          separacao3 = ':';
          conjunto1 = 2;
          conjunto2 = 5;
          conjunto3 = 10;
          conjunto4 = 13;
          conjunto5 = 16;
          if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19)){
            if (campo.value.length == conjunto1 )
            campo.value = campo.value + separacao1;
            else if (campo.value.length == conjunto2)
            campo.value = campo.value + separacao1;
            else if (campo.value.length == conjunto3)
            campo.value = campo.value + separacao2;
            else if (campo.value.length == conjunto4)
            campo.value = campo.value + separacao3;
            else if (campo.value.length == conjunto5)
            campo.value = campo.value + separacao3;
          }else{
            event.returnValue = false;
          }
    }
</script>
    
<script type="text/javascript">
    $(function(){
      $('#id_categoria').change(function(){
        if( $(this).val() ) {
          $('#id_sub_categoria').hide();
          $('.carregando').show();
          $.getJSON('../../sistema/php/apresentaDados/profissional/search.php?search=',{id_categoria: $(this).val(), ajax: 'true'}, function(j){
            var options = '<option value="">Escolha o Profissional</option>'; 
            for (var i = 0; i < j.length; i++) {
              options += '<option value="' + j[i].nome + '">' + j[i].nome + '</option>';
            } 
            $('#id_sub_categoria').html(options).show();
            $('.carregando').hide();
          });
        } else {
          $('#id_sub_categoria').html('<option value="">– Escolha Subcategoria –</option>');
        }
      });
    });
    </script>

    <script type="text/javascript">
    $(function(){
      $('#id_operadora').change(function(){
        if( $(this).val() ) {
          $('#id_valor').hide();
          $('.carrega').show();
          $.getJSON('../../sistema/php/apresentaDados/valores/search.php?search=',{id_operadora: $(this).val(), ajax: 'true'}, function(k){
            var options = '<option value="">Escolha o Procedimento</option>'; 
            for (var l = 0; l < k.length; l++) {
              options += '<option value="' + k[l].valor + '">' + k[l].codigo + ' - ' + k[l].descricao + '</option>';
            } 
            $('#id_valor').html(options).show();
            $('.carrega').hide();
          });
        } else {
          $('#id_valor').html('<option value="">– Escolha Procedimento –</option>');
        }
      });
    });
    </script>

    <script type='text/javascript'>
      $(document).ready(function(){
        $("input[name='cpf']").blur(function(){
          var $nome = $("input[name='nome']");
          var $email = $("input[name='email']");
          var $telefone = $("input[name='telefone']");
          $.getJSON('../../sistema/php/apresentaDados/paciente/preencher_auto.php',{ 
            cpf: $( this ).val() 
          },function( json ){
            $nome.val( json.nome);
            $email.val( json.email );
            $telefone.val( json.telefone );
          });
        });
      });
    </script>

</body>
</html>