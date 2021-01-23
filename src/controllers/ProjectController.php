<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Project.php';
require_once __DIR__.'/../repository/ProjectRepository.php';

class ProjectController extends AppController{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $message = [];
    private $projectRepository;

    public function __construct()
    {
        parent::__construct();
        $this->projectRepository = new ProjectRepository();
    }

    public function addfile()
    {   
        session_start();
        if (isset($_SESSION["id"])) {
            if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
                move_uploaded_file(
                    $_FILES['file']['tmp_name'], 
                    dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
                );

                $project = new Project($_POST['title'], $_POST['description'], $_FILES['file']['name']);
                $this->projectRepository->addProject($project);

                mkdir("public/uploads/".$_POST['title']);

                return $this->render('create', ['title' => $project->getTitle()]);
            }
            return $this->render('addfile', ['messages' => $this->message]);
        }
        else {
            echo "Nie jesteś zalogowany.";
        }
    }

    public function create() {
        return $this->render('create', ['title' => "New Story"]);
    }
    
    public function hub(){
        session_start();

        if (isset($_SESSION["id"])){
            $projects = $this->projectRepository->getProjects($_SESSION["id"]);
            $this->render('hub', ['projects' => $projects]);
        }
        else {
            echo "Nie jesteś zalogowany!";
        }
    }

    public function homepage(){
        $projects = $this->projectRepository->getProjects();
        $this->render('homepage', ['projects' => $projects]);
    }

    public function login() {
        $this->render('login');
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/login");
    }

    public function content() 
    {
        $this->render('content');
    }

    public function search(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->projectRepository->getProjectByTitle($decoded['search']));
        }
    }

    public function appendFile()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'], 
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_POST['title'].'/'.$_FILES['file']['name']
            );
            echo $_FILES['file']['name'];
        }
        else{
            echo 'naf';
        }
    }

    public function addGame()
    {
        $json = json_encode($_POST['game']);
        file_put_contents(dirname(__DIR__).self::UPLOAD_DIRECTORY.$_POST['title'].'/'.'game.json', $json);
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }  
}