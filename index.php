<?php 
require __DIR__."/vendor/autoload.php";

use Classes\controller\MainController;
use Classes\main\Application;
use Classes\Main\Request;
$app = new Application(dirname(__DIR__));

$app->get("/", [MainController::class, "home"]);
$app->post("/", [MainController::class, "toggleTodo"]);
$app->get("/todo", [MainController::class, "addForm"]);
$app->post("/todo", [MainController::class, "addTodo"]);
$app->post("/delete", [MainController::class, "deleteTodo"]);



$app->run();



















// $app->get("/about", function (Request $request) {
//     $data = $request->getBody();
//     var_dump($data);
//     return "About Us!";
// });




// class ControllerFolderandControllerName extends Controller {
//     private $error = array();

//     public function index() {
//         $data = array();

//         // $this->load->language('folder/languagefile');

//         // $this->document->setTitle($this->language->get('heading_title'));

//         // $this->load->model('folder/modelfile');


//         // TO DO...

        
//         $data['header'] = $this->load->controller('common/header');
//         $data['column_left'] = $this->load->controller('common/column_left');
//         $data['footer'] = $this->load->controller('common/footer');

//         $this->response->setOutput($this->load->view('folder/file.tpl', $data));
//     }

//     // public function anotherMethod(){

//     // }
// }
        

?>