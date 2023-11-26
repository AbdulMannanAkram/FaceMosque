import * as THREE from "three";
import { OBJLoader } from "three/addons/loaders/OBJLoader.js";
import { MTLLoader } from "three/addons/loaders/MTLLoader.js";
import { OrbitControls } from "three/addons/controls/OrbitControls.js";

const canvas = document.querySelector("canvas.obj"); // Updated selector to use class
const scene = new THREE.Scene();
let renderer = new THREE.WebGLRenderer({ antialias: true, canvas: canvas });
let camera;

init();
render();

function init() {
  // Create a perspective camera
  camera = new THREE.PerspectiveCamera(
    45,
    16 / 9,
    0.001, // Adjust near and far clipping planes
    1000
  );
  camera.position.set(0, 0, 5); // Adjust camera position

  scene.background = new THREE.Color("#ffffff");

  const mtlLoader = new MTLLoader();
  mtlLoader.load("../images/testing.mtl", function (materials) {
    materials.preload();

    const objLoader = new OBJLoader();
    objLoader.setMaterials(materials);

    objLoader.load("../images/testing.obj", function (object) {
      const model = object;

      // Adjust the scale of the loaded model
      const desiredScale = 0.0001; // Adjust the desired scale factor here
      model.scale.set(desiredScale, desiredScale, desiredScale);

      // Enable shadows for the loaded model
      model.traverse((child) => {
        if (child instanceof THREE.Mesh) {
          child.castShadow = true;
          child.receiveShadow = true;
        }
      });

      scene.add(model);
      render();
    });
  });

  const ambientLight = new THREE.AmbientLight(0xffffff);
  ambientLight.intensity = 0.4; // Reduced ambient light intensity
  scene.add(ambientLight);

  const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
  directionalLight.position.set(2, 4, 2);
  directionalLight.castShadow = true;
  scene.add(directionalLight);

  directionalLight.shadow.mapSize.width = 1024;
  directionalLight.shadow.mapSize.height = 1024;
  directionalLight.shadow.camera.near = 0.5;
  directionalLight.shadow.camera.far = 10; // Adjust shadow camera far plane

  renderer.setPixelRatio(window.devicePixelRatio);
  renderer.setSize(850, 600);
  renderer.toneMapping = THREE.ACESFilmicToneMapping;
  renderer.toneMappingExposure = 1;
  renderer.outputEncoding = THREE.sRGBEncoding;

  renderer.shadowMap.enabled = true;
  renderer.shadowMap.type = THREE.PCFSoftShadowMap;

  scene.add(camera);

  const controls = new OrbitControls(camera, renderer.domElement);
  controls.addEventListener("change", render);
  controls.minDistance = 0.2;
  controls.maxDistance = 40; // Adjust max distance

  window.addEventListener("resize", onWindowResize);
}

function onWindowResize() {
  camera.aspect = 16 / 9;
  camera.updateProjectionMatrix();

  renderer.setSize(700, 500);

  render();
}

function render() {
  renderer.render(scene, camera);
}
function onZoom() {
  // Update camera zoom here
  render(); // Call render after camera update
}
