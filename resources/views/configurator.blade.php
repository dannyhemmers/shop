@extends('layouts.app')

@section('content')
<div class="container-fluid">


  <script src="{{asset('three_js/build/three.min.js')}}"></script>
  <script src="{{asset('three_js/ColladaLoader.js')}}"></script>
  <script src="{{asset('three_js/OrbitControls.js')}}"></script>
  <script src="{{asset('three_js/Detector.js')}}"></script>
  <script type="text/javascript">
  <!--


  var frameLoader;
  var superLightArmsLoader, lightArmsLoader, normalArmsLoader, solidArmsLoader;
  var motorBlackLoader, motorBlueLoader, motorGreenLoader, motorRedLoader;
  var propsLoader;

  var renderWindow;
  var renderer;
  var kamera;
  var scene;
  var controls;

  var frontLight, backLight, leftLight, rightLight;

  var frame;
  var superLightArms, lightArms, normalArms, solidArms;
  var motorBlack, motorBlue, motorGreen, motorRed;
  var props;

  var carbon;

  var dropdownFrame, dropdownArms, dropdownMotor, dropdownProps;

  var loading;

  var webglId;


  function onLoadComplete() {
    if ( ! Detector.webgl ) Detector.addGetWebGLMessage();

webglId = document.getElementById('webglContainer');

appended = false;
loading = true
showLoadingStatus();

// dropdownFrame = document.getElementById("frameSelect");
// dropdownArms = document.getElementById("armsSelect");
// dropdownMotor = document.getElementById("motorSelect");
// dropdownProps = document.getElementById("propSelect");

//Erstellung der Loader
frameLoader = new THREE.ColladaLoader();
superLightArmsLoader = new THREE.ColladaLoader();
lightArmsLoader = new THREE.ColladaLoader();
normalArmsLoader = new THREE.ColladaLoader();
solidArmsLoader = new THREE.ColladaLoader();
motorBlackLoader = new THREE.ColladaLoader();
motorBlueLoader = new THREE.ColladaLoader();
motorGreenLoader = new THREE.ColladaLoader();
motorRedLoader = new THREE.ColladaLoader();
propsLoader = new THREE.ColladaLoader();

  	//Erstes Collada-Model laden
  	frameLoader.load('/../assets/copter_normal_frame.dae', onLoadFrameComplete);
  }

  function onLoadFrameComplete(collada) {
  	erstelle3DWelt();

  	frame = collada.scene;
  	frame.visible = true;
  	scene.add(frame);

  	normalArmsLoader.load('/../assets/copter_normal_arms.dae', onLoadNormalArmsComplete);
  }

  function onLoadNormalArmsComplete(collada) {
  	normalArms = collada.scene;
  	normalArms.visible = true;
  	scene.add(normalArms);

  	motorBlackLoader.load('/../assets/copter_motors_black.dae', onLoadMotorBlackComplete);
  }

  function onLoadMotorBlackComplete(collada) {
  	motorBlack = collada.scene;
  	scene.add(motorBlack);
  	motorBlack.visible = true;

  	propsLoader.load('/../assets/copter_props.dae', onLoadPropsComplete);
  }

  function onLoadPropsComplete(collada) {
  	props = collada.scene;
  	scene.add(props);
  	props.visible = true;

  	render();
  	loading = false;
  	showLoadingStatus();
  	animate();

  	superLightArmsLoader.load('/../assets/copter_super_light_arms.dae', onLoadSuperLightArmsComplete);
  }


  function onLoadSuperLightArmsComplete(collada) {
  	superLightArms = collada.scene;
  	superLightArms.visible = false;
  	scene.add(superLightArms);

  	lightArmsLoader.load('/../assets/copter_light_arms.dae', onLoadLightArmsComplete);
  }

  function onLoadLightArmsComplete(collada) {
  	lightArms = collada.scene;
  	lightArms.visible = false;
  	scene.add(lightArms);

  	solidArmsLoader.load('/../assets/copter_solid_arms.dae', onLoadSolidArmsComplete);
  }

  function onLoadSolidArmsComplete(collada) {
  	solidArms = collada.scene;
  	solidArms.visible = false;
  	scene.add(solidArms);

  	motorBlueLoader.load('/../assets/copter_motors_blue.dae', onLoadMotorBlueComplete);
  }

  function onLoadMotorBlueComplete(collada) {
  	motorBlue = collada.scene;
  	scene.add(motorBlue);
  	motorBlue.visible = false;

  	motorGreenLoader.load('/../assets/copter_motors_green.dae', onLoadMotorGreenComplete);
  }

  function onLoadMotorGreenComplete(collada) {
  	motorGreen = collada.scene;
  	scene.add(motorGreen);
  	motorGreen.visible = false;

  	motorRedLoader.load('/../assets/copter_motors_red.dae', onLoadMotorRedComplete);
  }

  function onLoadMotorRedComplete(collada) {
  	motorRed = collada.scene;
  	scene.add(motorRed);
  	motorRed.visible = false;
  }

  function erstelle3DWelt() {
    //Erstellung der renderWindow
  	renderWindow = document.getElementById("webglContainer");

  	//Erstellung des renderers
  	renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
  	renderer.setSize((renderWindow.clientWidth), renderWindow.clientHeight, true);
  	//renderer.setClearColor(0xf7f6f0);
  	renderer.setClearColor(0xFFFFFF);

  	renderWindow.appendChild(renderer.domElement);

  	//Erstellung der 3D-Welt
  	scene = new THREE.Scene();

  	addCamera();
  	addLights();
  	addControls();
  }

  function addCamera() {
    //Erstellung der Kamera			Betrachtungswinkel, Seitenverhältnis, ???, Kamerasichtweite (kann bis 1000 weit sehen)
  	kamera = new THREE.PerspectiveCamera(30, (renderWindow.clientWidth)/renderWindow.clientHeight, 1, 100000);
  	kamera.position.z = 13;
  	kamera.position.y = 7;
  	kamera.rotation.x = -0.78; // in rad, sind ca. 45°
  	scene.add(kamera);
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
    controls = new THREE.OrbitControls(kamera, renderer.domElement);
    controls.enableDamping = true;
    controls.dampingFactor = 0.9;
    controls.enableZoom = true;
  }

  function render() {
  	renderer.render(scene, kamera);
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

  function selectedFrame(value) {
    var strUser = value;

  	if (strUser == "0") {
  		frame.visible = false;

  		deselectArms();
  		deselectMotor();
  		deselectProps();
  	}
  	else if (strUser == "1") {
  		frame.visible = true;
  	}
  }

  function selectedArms(value) {
    var strUser = value;

  	if (strUser == "0") {
  		superLightArms.visible = false;
  		lightArms.visible = false;
  		normalArms.visible = false;
  		solidArms.visible = false;

  		deselectMotor();
  		deselectProps();
  	}
  	else if (strUser == "1") {
  		superLightArms.visible = true;
  		lightArms.visible = false;
  		normalArms.visible = false;
  		solidArms.visible = false;
  	}
  	else if (strUser == "2") {
  		superLightArms.visible = false;
  		lightArms.visible = true;
  		normalArms.visible = false;
  		solidArms.visible = false;
  	}
  	else if (strUser == "3") {
  		superLightArms.visible = false;
  		lightArms.visible = false;
  		normalArms.visible = true;
  		solidArms.visible = false;
  	}
  	else if (strUser == "4") {
  		superLightArms.visible = false;
  		lightArms.visible = false;
  		normalArms.visible = false;
  		solidArms.visible = true;
  	}
  }

  function selectedMotor(value) {
    var strUser = value;

    if (strUser == "0") {
      motorBlack.visible = false;
      motorBlue.visible = false;
      motorGreen.visible = false;
      motorRed.visible = false;

      deselectProps();
    }
    else if (strUser == "1") {
      motorBlack.visible = true;
      motorBlue.visible = false;
      motorGreen.visible = false;
      motorRed.visible = false;
    }
    else if (strUser == "2") {
      motorBlack.visible = false;
      motorBlue.visible = true;
      motorGreen.visible = false;
      motorRed.visible = false;
    }
    else if (strUser == "3") {
      motorBlack.visible = false;
      motorBlue.visible = false;
      motorGreen.visible = true;
      motorRed.visible = false;
    }
    else if (strUser == "4") {
      motorBlack.visible = false;
      motorBlue.visible = false;
      motorGreen.visible = false;
      motorRed.visible = true;
    }
  }

  function selectedProps(value) {
    var strUser = value;

  	if (strUser == "0") {
  		props.visible = false;
  	}
  	else if (strUser == "1") {
  		props.visible = true;
  	}
  }


function deselectArms() {
	//dropdownArms.options[0].selected = true;

	superLightArms.visible = false;
	lightArms.visible = false;
	normalArms.visible = false;
	solidArms.visible = false;
}

function deselectMotor() {
	//dropdownMotor.options[0].selected = true;

	motorBlack.visible = false;
	motorBlue.visible = false;
	motorGreen.visible = false;
	motorRed.visible = false;
}

function deselectProps() {
	//dropdownProps.options[0].selected = true;

	props.visible = false;
}

  function selectedStands() {
  	var e = document.getElementById("standsSelect");
  	var strUser = e.options[e.selectedIndex].value;

  	if (strUser == "0") {
  		stands.visible = false;
  	}
  	else if (strUser == "1") {
  		stands.visible = true;
  	}
  }

  -->

  $(function() {


        $("#frame0").click( function()
           {
             selectedFrame(0);
           }
        );

        $("#frame1").click( function()
           {
             selectedFrame(1);
           }
        );

        $("#arm0").click( function()
           {
             selectedArms(0);
           }
        );

        $("#arm1").click( function()
           {
             selectedArms(1);
           }
        );

        $("#arm2").click( function()
           {
             selectedArms(2);
           }
        );

        $("#arm3").click( function()
           {
             selectedArms(3);
           }
        );

        $("#arm4").click( function()
           {
             selectedArms(4);
           }
        );

        $("#motor0").click( function()
             {
               selectedMotor(0);
             }
        );

        $("#motor1").click( function()
             {
               selectedMotor(1);
             }
        );

        $("#motor2").click( function()
             {
               selectedMotor(2);
             }
        );

        $("#motor3").click( function()
             {
               selectedMotor(3);
             }
        );

        $("#motor4").click( function()
             {
               selectedMotor(4);
             }
        );

        $("#prop0").click( function()
             {
               selectedProps(0);
             }
        );

        $("#prop1").click( function()
             {
               selectedProps(1);
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

      <!-- <form action="/finishconfig" method="POST">

  						<select class="configselect form-control" id="frameSelect" onchange="selectedFrame();" name="frames" size="1">
  							<option value="0">No frame</option>
  							<option value="1" selected>TBS Discovery Pro frame</option>
  						</select>

  						<select class="configselect form-control" id="armsSelect" onchange="selectedArms();" name="arms" size="1">
                <option value="0">No arms</option>
  							<option value="1">Super light arms</option>
  							<option value="2">Light arms</option>
  							<option value="3" selected>Normal arms</option>
  							<option value="4">Solid arms</option>
  						</select>


  						<select class="configselect form-control" id="motorSelect" onchange="selectedMotor();" name="motors" size="1">
  							<option value="0">No motor</option>
  							<option value="1" selected>Black motor</option>
  							<option value="2">Blue motor</option>
  							<option value="3">Green motor</option>
  							<option value="4">Red motor</option>
  						</select>

  						<select class="configselect form-control" id="propSelect" onchange="selectedProps();" name="props" size="1">
  							<option value="0">No props</option>
  							<option value="1" selected>Standard props</option>
  						</select>
                {{ csrf_field() }}

                <button type="submit" class="btn btn-primary btn-lg btn-block">Abschließen</button>

              </form> -->
              <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                  <button type="button" id="frame0" class="btn btn-primary">Kein Rahmen</button>
                </div>
                <div class="btn-group" role="group">
                  <button type="button" id="frame1" class="btn btn-primary">TBS Discovery Pro frame</button>
                </div>
              </div>

              <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                  <button type="button" id="arm0" class="btn btn-primary">Keine Arme</button>
                </div>
                <div class="btn-group" role="group">
                  <button type="button" id="arm1" class="btn btn-primary">Superleichte Arme</button>
                </div>
                <div class="btn-group" role="group">
                  <button type="button" id="arm2" class="btn btn-primary">Leichte Arme</button>
                </div>
                <div class="btn-group" role="group">
                  <button type="button" id="arm3" class="btn btn-primary">Normale Arme</button>
                </div>
                <div class="btn-group" role="group">
                  <button type="button" id="arm4" class="btn btn-primary">Solide Arme</button>
                </div>
              </div>

              <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                  <button type="button" id="motor0" class="btn btn-primary">Kein Motor</button>
                </div>
                <div class="btn-group" role="group">
                  <button type="button" id="motor1" class="btn btn-primary">Schwarzer Motor</button>
                </div>
                <div class="btn-group" role="group">
                  <button type="button" id="motor2" class="btn btn-primary">Blauer Motor</button>
                </div>
                <div class="btn-group" role="group">
                  <button type="button" id="motor3" class="btn btn-primary">Grüner Motor</button>
                </div>
                <div class="btn-group" role="group">
                  <button type="button" id="motor4" class="btn btn-primary">Roter Motor</button>
                </div>
              </div>

              <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                  <button type="button" id="prop0" class="btn btn-primary">Keine Props</button>
                </div>
                <div class="btn-group" role="group">
                  <button type="button" id="prop1" class="btn btn-primary">Standard Props</button>
                </div>
              </div>

              <div class="form-group">
                <label for="sel1">Drohne zusammenbauen?</label>
                <select class="form-control" id="sel1">
                  <option>Ja</option>
                  <option>Nein</option>
                </select>
              </div>
              <button class="btn btn-lg">Abschicken</button>
</div>
</div>




@endsection
