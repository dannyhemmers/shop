@extends('layouts.app')

@section('content')
<div class="container-fluid">


  <script src="{{asset('three_js/build/three.min.js')}}"></script>
  <script src="{{asset('three_js/ColladaLoader.js')}}"></script>
  <script src="{{asset('three_js/OrbitControls.js')}}"></script>
  <script src="{{asset('three_js/Detector.js')}}"></script>
  <script type="text/javascript">
  <!--


  var frame, arms, board;
  var motor1, motor2, motor3;
  var props1, props2, props3, props4;
  var receiver1, receiver2;
  var controller1, controller2, controller3, controller4;

  var frameLoader, armsLoader, boardLoader, motorLoader, propsLoader, receiverLoader, controllerLoader;

  var renderWindow;
  var renderer;
  var camera;
  var scene;
  var controls;

  var frontLight, backLight, leftLight, rightLight;

  var dropdownFrame, dropdownArms, dropdownMotor, dropdownProps;

  var loading;

  var webglId;

  var timestamp = Date.now();

  var frameid = 3;
  var framename = timestamp + ' Frame ZMR 250 Carbon';
  var frameamount = 1;
  var frameprice = 49.99;

  var powerid = 7;
  var powername = timestamp + " Mini Stromverteilerplatine";
  var poweramount = 1;
  var powerprice = 15.49;

  var motorid = 4;
  var motorname = timestamp + " Motor";
  var motoramount = 1;
  var motorprice = 94.9;

  var propid = 9;
  var propname = timestamp + " Propeller";
  var propamount = 1;
  var propprice = 34.45;

  var receiverid = 10;
  var receivername = timestamp + " Empfänger";
  var receiveramount = 1;
  var receiverprice = 34.90;

  var controllerid = 5;
  var controllername = timestamp + " ESC 2-4S Oneshot 20A Blau";
  var controlleramount = 1;
  var controllerprice = 64.49;

  function onLoadComplete() {
    if ( ! Detector.webgl ) Detector.addGetWebGLMessage();

	webglId = document.getElementById('webglContainer');

	appended = false;
	loading = true
	showLoadingStatus();

	//Creating loaders
	frameLoader = new THREE.ColladaLoader();
	armsLoader = new THREE.ColladaLoader();
	boardLoader = new THREE.ColladaLoader();
	motorLoader = [new THREE.ColladaLoader(), new THREE.ColladaLoader(), new THREE.ColladaLoader()];
	propsLoader = [new THREE.ColladaLoader(), new THREE.ColladaLoader(), new THREE.ColladaLoader(), new THREE.ColladaLoader()];
	receiverLoader = [new THREE.ColladaLoader(), new THREE.ColladaLoader()];
	controllerLoader = [new THREE.ColladaLoader(), new THREE.ColladaLoader(), new THREE.ColladaLoader(), new THREE.ColladaLoader()];

  	//Load first Collada-Model
	frameLoader.load('./assets/frame_zmr250.dae', onLoadFrameComplete);
  }

  function onLoadFrameComplete(collada) {
  	create3DWorld();

  	frame = collada.scene;
  	frame.visible = true;
  	rotate(frame);
  	scene.add(frame);

  	armsLoader.load('./assets/arms_zmr250.dae', onLoadArmsComplete);
  }

  function onLoadArmsComplete(collada) {
  	arms = collada.scene;
  	arms.visible = true;
  	rotate(arms);
  	scene.add(arms);

  	boardLoader.load('./assets/board.dae', onLoadBoardComplete);
  }

  function onLoadBoardComplete(collada) {
  	board = collada.scene;
  	board.visible = true;
  	rotate(board);
  	scene.add(board);

  	motorLoader[0].load('./assets/motor1.dae', onLoadMotor1Complete);
  }

  function onLoadMotor1Complete(collada) {
	motor1 = collada.scene;
	motor1.visible = true;
	rotate(motor1);
	scene.add(motor1);

	propsLoader[0].load('./assets/props1.dae', onLoadProps1Complete);
  }

  function onLoadProps1Complete(collada) {
  	props1 = collada.scene;
  	props1.visible = true;
  	rotate(props1);
  	scene.add(props1);

  	receiverLoader[0].load('./assets/receiver1.dae', onLoadReceiver1Complete);
  }

  function onLoadReceiver1Complete(collada) {
  	receiver1 = collada.scene;
  	receiver1.visible = true;
  	rotate(receiver1);
  	scene.add(receiver1);

  	controllerLoader[0].load('./assets/controller1.dae', onLoadController1Complete);
  }

  function onLoadController1Complete(collada) {
	controller1 = collada.scene;
	controller1.visible = true;
	rotate(controller1);
	scene.add(controller1);

	// All visible objects loaded completely, now showing the scene
	render();
	loading = false;
	showLoadingStatus();
	animate();

	// Load invisible objects afterwards
	motorLoader[1].load('./assets/motor2.dae', onLoadMotor2Complete);
  }

  function onLoadMotor2Complete(collada) {
	motor2 = collada.scene;
  	motor2.visible = false;
  	rotate(motor2);
  	scene.add(motor2);

  	motorLoader[2].load('./assets/motor3.dae', onLoadMotor3Complete);
  }

  function onLoadMotor3Complete(collada) {
  	motor3 = collada.scene;
  	motor3.visible = false;
  	rotate(motor3);
  	scene.add(motor3);

  	propsLoader[1].load('./assets/props2.dae', onLoadProps2Complete);
  }

  function onLoadProps2Complete(collada) {
  	props2 = collada.scene;
  	props2.visible = false;
  	rotate(props2);
  	scene.add(props2);

  	propsLoader[2].load('./assets/props3.dae', onLoadProps3Complete);
  }

  function onLoadProps3Complete(collada) {
  	props3 = collada.scene;
  	props3.visible = false;
  	rotate(props3);
  	scene.add(props3);

  	propsLoader[3].load('./assets/props4.dae', onLoadProps4Complete);
  }

  function onLoadProps4Complete(collada) {
  	props4 = collada.scene;
  	props4.visible = false;
  	rotate(props4);
  	scene.add(props4);

  	receiverLoader[1].load('./assets/receiver2.dae', onLoadReceiver2Complete);
  }

  function onLoadReceiver2Complete(collada) {
  	receiver2 = collada.scene;
  	receiver2.visible = false;
  	rotate(receiver2);
  	scene.add(receiver2);

  	controllerLoader[1].load('./assets/controller2.dae', onLoadController2Complete);
  }

  function onLoadController2Complete(collada) {
	controller2 = collada.scene;
	controller2.visible = false;
	rotate(controller2);
	scene.add(controller2);

  	controllerLoader[2].load('./assets/controller3.dae', onLoadController3Complete);
  }

  function onLoadController3Complete(collada) {
  	controller3 = collada.scene;
  	controller3.visible = false;
  	rotate(controller3);
  	scene.add(controller3);

  	controllerLoader[3].load('./assets/controller4.dae', onLoadController4Complete);
  }

  function onLoadController4Complete(collada) {
  	controller4 = collada.scene;
  	controller4.visible = false;
  	rotate(controller4);
  	scene.add(controller4);
  }


  function rotate(object) {
  	object.rotation.y += Math.PI / 2;
  	object.rotation.y -= Math.PI / 8;
  }

  function create3DWorld() {
    //Creating renderWindow
  	renderWindow = document.getElementById("webglContainer");

  	//Creating renderer
  	renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
  	renderer.setSize((renderWindow.clientWidth), renderWindow.clientHeight, true);
  	renderer.setClearColor(0xFFFFFF);

  	renderWindow.appendChild(renderer.domElement);

  	//Creating 3D-World
  	scene = new THREE.Scene();

  	addCamera();
  	addLights();
  	addControls();
  }

  function addCamera() {
    //Creating camera
  	camera = new THREE.PerspectiveCamera(38, (renderWindow.clientWidth)/renderWindow.clientHeight, 1, 100000);
  	camera.position.z = 13;
  	camera.position.y = 6;
  	scene.add(camera);
  }

  function addLights() {
    frontLight = new THREE.DirectionalLight(0xffffff, 0.9);
      frontLight.position.set(-0.5, 1.75, 1);
      frontLight.position.multiplyScalar(50);
  	scene.add(frontLight);

  	backLight = new THREE.DirectionalLight(0xffffff, 0.7);
      backLight.position.set(0.5, -1.75, -1);
      backLight.position.multiplyScalar(50);
  	scene.add(backLight);

  	leftLight = new THREE.DirectionalLight(0xffffff, 0.3);
      leftLight.position.set(1.75, 1, -0.5);
      leftLight.position.multiplyScalar(50);
  	scene.add(leftLight);

  	rightLight = new THREE.DirectionalLight(0xffffff, 0.3);
      rightLight.position.set(-1.75, -1, 0.5);
      rightLight.position.multiplyScalar(50);
  	scene.add(rightLight);
  }

  function addControls() {
    controls = new THREE.OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;
    controls.dampingFactor = 0.9;
    controls.enableZoom = true;
  }

  function render() {
  	renderer.render(scene, camera);
  	renderWindow.appendChild(renderer.domElement);
  }

  function animate() {
      requestAnimationFrame(animate);
      controls.update();
      render();
  }

  function showLoadingStatus() {
  	if (loading) {
  		webglId.innerHTML = "<div id='loading' align='center'>Konfigurator wird geladen</div>";
  	}
  	else {
  		webglId.innerHTML = "";
  	}
  }


  //Select functions

  function selectedFrame(value) {
    var strUser = value;

  	if (strUser == "0") {
  		frame.visible = false;

  		deselectArms();
		deselectBoard();
  		deselectMotor();
  		deselectProps();
		deselectReceiver();
		deselectController();
  	}
  	else if (strUser == "1") {
  		frame.visible = true;
  	}
  }

  function selectedArms(value) {
    var strUser = value;

  	if (strUser == "0") {
  		arms.visible = false;

  		deselectMotor();
  		deselectProps();
		deselectController();
  	}
  	else if (strUser == "1") {
  		arms.visible = true;
  	}
  }

  function selectedBoard(value) {
    var strUser = value;

  	if (strUser == "0") {
  		board.visible = false;
  	}
  	else if (strUser == "1") {
  		board.visible = true;
  	}
  }

  function selectedMotor(value) {
    var strUser = value;

    if (strUser == "0") {
      motor1.visible = false;
      motor2.visible = false;
      motor3.visible = false;

      deselectProps();
    }
    else if (strUser == "1") {
      motor1.visible = true;
      motor2.visible = false;
      motor3.visible = false;
    }
    else if (strUser == "2") {
      motor1.visible = false;
      motor2.visible = true;
      motor3.visible = false;
    }
    else if (strUser == "3") {
      motor1.visible = false;
      motor2.visible = false;
      motor3.visible = true;
    }
  }

  function selectedProps(value) {
    var strUser = value;

  	if (strUser == "0") {
  		props1.visible = false;
		props2.visible = false;
		props3.visible = false;
		props4.visible = false;
  	}
  	else if (strUser == "1") {
  		props1.visible = true;
		props2.visible = false;
		props3.visible = false;
		props4.visible = false;
  	}
	else if (strUser == "2") {
  		props1.visible = false;
		props2.visible = true;
		props3.visible = false;
		props4.visible = false;
  	}
	else if (strUser == "3") {
  		props1.visible = false;
		props2.visible = false;
		props3.visible = true;
		props4.visible = false;
  	}
	else if (strUser == "4") {
  		props1.visible = false;
		props2.visible = false;
		props3.visible = false;
		props4.visible = true;
  	}
  }

  function selectedReceiver(value) {
    var strUser = value;

  	if (strUser == "0") {
  		receiver1.visible = false;
		receiver2.visible = false;
	}
	else if (strUser == "1") {
		receiver1.visible = true;
		receiver2.visible = false;
	}
	else if (strUser == "2") {
		receiver1.visible = false;
		receiver2.visible = true;
	}
  }

  function selectedController(value) {
    var strUser = value;

  	if (strUser == "0") {
  		controller1.visible = false;
		controller2.visible = false;
		controller3.visible = false;
		controller4.visible = false;
	}
	else if (strUser == "1") {
		controller1.visible = true;
		controller2.visible = false;
		controller3.visible = false;
		controller4.visible = false;
	}
	else if (strUser == "2") {
		controller1.visible = false;
		controller2.visible = true;
		controller3.visible = false;
		controller4.visible = false;
	}
	else if (strUser == "3") {
		controller1.visible = false;
		controller2.visible = false;
		controller3.visible = true;
		controller4.visible = false;
	}
	else if (strUser == "4") {
		controller1.visible = false;
		controller2.visible = false;
		controller3.visible = false;
		controller4.visible = true;
	}
  }


//Deselect functions

function deselectArms() {
	arms.visible = false;
}

function deselectBoard() {
	board.visible = false;
}

function deselectMotor() {
	motor1.visible = false;
	motor2.visible = false;
	motor3.visible = false;
}

function deselectProps() {
	props1.visible = false;
	props2.visible = false;
	props3.visible = false;
	props4.visible = false;
}

function deselectReceiver() {
	receiver1.visible = false;
	receiver2.visible = false;
}

function deselectController() {
	controller1.visible = false;
	controller2.visible = false;
	controller3.visible = false;
	controller4.visible = false;
}

  -->

//Vorbereitung
//CSRF Token wird ausgelesen
//Wird für den POST benötigt
  $(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
      }
    });
  });

  //Abfangen der einzelnen Buttons
  //Hier werden die obigen Funktionen aufgerufen
  //und die Werte für den Warenkorb geändert
  $(function() {


        $("#frame0").click( function()
           {
             selectedFrame(0);
             frameid = 0;
           }
        );

        $("#frame1").click( function()
           {
             selectedFrame(1);
             var frameid = 3;
             var framename = timestamp + ' Frame ZMR 250 Carbon';
             var frameamount = 1;
             var frameprice = 49.99;
           }
        );

        $("#arm0").click( function()
           {
             selectedArms(0);
             frameid = 0;
           }
        );

        $("#arm1").click( function()
           {
             selectedArms(1);
             var frameid = 3;
             var framename = timestamp + ' Frame ZMR 250 Carbon';
             var frameamount = 1;
             var frameprice = 49.99;
           }
        );

        $("#board0").click( function()
           {
             selectedBoard(0);
             powerid = 0;
           }
        );

        $("#board1").click( function()
           {
             selectedBoard(1);
             var powerid = 7;
             var powername = timestamp + " Mini Stromverteilerplatine";
             var poweramount = 1;
             var powerprice = 15.49;
           }
        );

        $("#motor0").click( function()
             {
               selectedMotor(0);
               motorid = 0;
             }
        );

        $("#motor1").click( function()
             {
               selectedMotor(1);
               motorid = 4;
               motorname = timestamp + " EMAX RS2205 (2300kv)";
               motorprice = 94.9;
               motoramount = 1;
             }
        );

        $("#motor2").click( function()
             {
               selectedMotor(2);
               motorid = 4;
               motorname = timestamp + " DYS 1806 (2300kv)";
               motorprice = 94.9;
               motoramount = 1;
             }
        );

        $("#motor3").click( function()
             {
               selectedMotor(3);
               motorid = 13;
               motorname = timestamp + " Tarot 4008 (3300kv)";
               motorprice = 364.49;
               motoramount = 1;
             }
        );

        $("#prop0").click( function()
             {
               selectedProps(0);
               propid = 0;
             }
        );

        $("#prop1").click( function()
             {
               selectedProps(1);
               propid = 9;
               propname = timestamp + " 6 x 4.5R Schwarz";
               propamount = 1;
               propprice = 34.45;
             }
        );

        $("#prop2").click( function()
             {
               selectedProps(2);
               propid = 9;
               propname = timestamp + " 6 x 4.5R Silber";
               propamount = 1;
               propprice = 34.45;
             }
        );

        $("#prop3").click( function()
             {
               selectedProps(3);
               propid = 16;
               propname = timestamp + " Tarot A14EVO Schwarz";
               propamount = 1;
               propprice = 99.89;
             }
        );

        $("#prop4").click( function()
             {
               selectedProps(4);
               propid = 16;
               propname = timestamp + " Tarot A14EVO Rot";
               propamount = 1;
               propprice = 99.89;
             }
        );

        $("#receiver0").click( function()
             {
               selectedReceiver(0);
               receiverid = 0;
             }
        );

		$("#receiver1").click( function()
             {
               selectedReceiver(1);
               receiverid = 10;
               receivername = timestamp + " OrangeRX R615X";
               receiveramount = 1;
               receiverprice = 34.90;
             }
        );

		$("#receiver2").click( function()
             {
               selectedReceiver(2);
               receiverid = 10;
               receivername = timestamp + " Graupner GR-12 HoTT";
               receiveramount = 1;
               receiverprice = 49.90;
             }
        );

		$("#controller0").click( function()
             {
               selectedController(0);
               controllerid = 0;
             }
        );

		$("#controller1").click( function()
             {
               selectedController(1);
               controllerid = 5;
               controllername = timestamp + " ESC 2-4S Oneshot 20A Blau";
               controlleramount = 1;
               controllerprice = 64.49;
             }
        );

		$("#controller2").click( function()
             {
               selectedController(2);
               controllerid = 5;
               controllername = timestamp + " ESC 2-4S Oneshot 20A Durchsichtig";
               controlleramount = 1;
               controllerprice = 64.49;
             }
        );

		$("#controller3").click( function()
             {
               selectedController(3);
               controllerid = 17;
               controllername = timestamp + " EMAX 12A Simon K Schwarz";
               controlleramount = 1;
               controllerprice = 79.49;
             }
        );

		$("#controller4").click( function()
             {
               selectedController(4);
               controllerid = 17;
               controllername = timestamp + " EMAX 12A Simon K Schwarz";
               controlleramount = 1;
               controllerprice = 79.49;
             }
        );

    //Konfigurierte Drohnendaten in den Warenkorb senden
    $("#senddrone").click( function()
       {
         //Daten
         var buildservice = $('#sel1').val();

         var data={
           buildservice: buildservice,
           timestamp: timestamp,
           frameid: frameid,
           framename: framename,
           frameamount: frameamount,
           frameprice: frameprice,
           powerid: powerid,
           powername: powername,
           poweramount: poweramount,
           powerprice: powerprice,
           motorid: motorid,
           motorname: motorname,
           motoramount: motoramount,
           motorprice: motorprice,
           propid: propid,
           propname: propname,
           propamount: propamount,
           propprice: propprice,
           receiverid: receiverid,
           receivername: receivername,
           receiveramount: receiveramount,
           receiverprice: receiverprice,
           controllerid: controllerid,
           controllername: controllername,
           controlleramount: controlleramount,
           controllerprice: controllerprice,

         }

         //Wenn eine Komponente abgewählt wurde
         if(frameid == 0 || motorid == 0 || powerid == 0 || propid == 0 || receiverid == 0 || controllerid == 0)
         {
           alert('Sie müssen alle Komponenten wählen');
         }

         else
         {
           //Nach dem Abschicken weiterleiten zum Warenkorb
           $.ajax({
                type: "POST",
                url: '/addToCartAJAX',
                data: data,
                success: function() {
                    location.href = "/shoppingcart";
                }
           });
         }



       }
    );

  });
  </script>

  <body onload="onLoadComplete();">

    <div class="col-md-6">
  	<div id="webglContainer"></div>
  	<div id="loadingIndicator" align="center"></div>
    </div>
    <div class="col-md-6">
  	<div id="buttons">
      <div class="btn-group btn-group-justified" role="group">
  	  <div class="btn-group" role="group">
  	    <button type="button" id="frame0" class="btn btn-primary">Kein Rahmen</button>
  	  </div>
  	  <div class="btn-group" role="group">
  	    <button type="button" id="frame1" class="btn btn-primary">ZMR 250 Rahmen</button>
  	  </div>
      </div>

      <div class="btn-group btn-group-justified" role="group">
  	  <div class="btn-group" role="group">
  	    <button type="button" id="arm0" class="btn btn-primary">Keine Arme</button>
  	  </div>
  	  <div class="btn-group" role="group">
  	    <button type="button" id="arm1" class="btn btn-primary">ZMR 250 Arme</button>
  	  </div>
      </div>

      <div class="btn-group btn-group-justified" role="group">
  	  <div class="btn-group" role="group">
  	    <button type="button" id="board0" class="btn btn-primary">Keine Stromverteilerplatine</button>
  	  </div>
  	  <div class="btn-group" role="group">
  	    <button type="button" id="board1" class="btn btn-primary">Mini Stromverteilerplatine</button>
  	  </div>
      </div>

      <div class="btn-group btn-group-justified" role="group">
  	  <div class="btn-group" role="group">
  	    <button type="button" id="motor0" class="btn btn-primary">Kein Motor</button>
  	  </div>
  	  <div class="btn-group" role="group">
  	    <button type="button" id="motor1" class="btn btn-primary">EMAX RS2205 (2300kv)</button>
  	  </div>
  	  <div class="btn-group" role="group">
  	    <button type="button" id="motor2" class="btn btn-primary">DYS 1806 (2300kv)</button>
  	  </div>
  	  <div class="btn-group" role="group">
  	    <button type="button" id="motor3" class="btn btn-primary">Tarot 4008 (3300kv)</button>
  	  </div>
      </div>

      <div class="btn-group btn-group-justified" role="group">
  	  <div class="btn-group" role="group">
  	    <button type="button" id="prop0" class="btn btn-primary">Keine Props</button>
  	  </div>
  	  <div class="btn-group" role="group">
  	    <button type="button" id="prop1" class="btn btn-primary">6 x 4.5"R Schwarz</button>
  	  </div>
  	  <div class="btn-group" role="group">
  	    <button type="button" id="prop2" class="btn btn-primary">6 x 4.5"R Silber</button>
  	  </div>
  	  <div class="btn-group" role="group">
  	    <button type="button" id="prop3" class="btn btn-primary">Tarot A14EVO Schwarz</button>
  	  </div>
  	  <div class="btn-group" role="group">
  	    <button type="button" id="prop4" class="btn btn-primary">Tarot A14EVO Rot</button>
  	  </div>
      </div>

      <div class="btn-group btn-group-justified" role="group">
  	  <div class="btn-group" role="group">
  	    <button type="button" id="receiver0" class="btn btn-primary">Kein Empfänger</button>
  	  </div>
  	  <div class="btn-group" role="group">
  	    <button type="button" id="receiver1" class="btn btn-primary">OrangeRX R615X</button>
  	  </div>
  	  <div class="btn-group" role="group">
  	    <button type="button" id="receiver2" class="btn btn-primary">Graupner GR-12 HoTT</button>
  	  </div>
      </div>

      <div class="btn-group btn-group-justified" role="group">
  	  <div class="btn-group" role="group">
  	    <button type="button" id="controller0" class="btn btn-primary">Kein Flugcontroller</button>
  	  </div>
  	  <div class="btn-group" role="group">
  	    <button type="button" id="controller1" class="btn btn-primary">ESC 2-4S Oneshot 20A Blau</button>
  	  </div>
  	  <div class="btn-group" role="group">
  	    <button type="button" id="controller2" class="btn btn-primary">ESC 2-4S Oneshot 20A Durchsichtig</button>
  	  </div>
  	  <div class="btn-group" role="group">
  	    <button type="button" id="controller3" class="btn btn-primary">EMAX 12A Simon K Schwarz</button>
  	  </div>
  	  <div class="btn-group" role="group">
  	    <button type="button" id="controller4" class="btn btn-primary">EMAX 12A Simon K Schwarz-Rot</button>
  	  </div>
    </div>


    <div class="form-group">
  	  <label for="sel1">Drohne zusammenbauen?</label>
  	  <select class="form-control" id="sel1">
  	    <option>Ja</option>
  	    <option>Nein</option>
  	  </select>
    </div>
    <button id="senddrone" class="btn btn-lg">Abschicken</button>
  </div>
</div>




@endsection
