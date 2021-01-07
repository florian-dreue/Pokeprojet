<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class DashboardController extends AppController
    {
        public function index()
        {
            $this->paginate = [
                'limit' => 30,
            ];
        }
    }
?>
