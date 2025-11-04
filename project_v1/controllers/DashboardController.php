<?php

class DashboardController {
    private $auth;
    private $taskModel;
    private $quoteModel;

    public function __construct() {
        $this->auth = new Auth();
        $this->taskModel = new Task();
        $this->quoteModel = new Quote();
    }

    public function index() {
        $this->auth->requireAuth();
        
        $user = $this->auth->getCurrentUser();
        $stats = $this->taskModel->getStats($user['id']);
        $quote = $this->quoteModel->getDailyQuote();
        $overdueTasks = $this->taskModel->getOverdueTasks($user['id']);
        
        // Mock upcoming buses data
        $upcomingBuses = [
            [
                'bus_no' => 'A-101',
                'route' => 'Kathmandu - Pokhara',
                'departure' => '08:30 AM',
                'seats_available' => 12
            ],
            [
                'bus_no' => 'B-205',
                'route' => 'Kathmandu - Chitwan',
                'departure' => '10:15 AM',
                'seats_available' => 8
            ],
            [
                'bus_no' => 'C-303',
                'route' => 'Pokhara - Lumbini',
                'departure' => '02:45 PM',
                'seats_available' => 15
            ],
            [
                'bus_no' => 'D-407',
                'route' => 'Kathmandu - Dharan',
                'departure' => '06:00 PM',
                'seats_available' => 3
            ],
            [
                'bus_no' => 'E-512',
                'route' => 'Butwal - Nepalgunj',
                'departure' => '09:30 PM',
                'seats_available' => 20
            ]
        ];

        require_once __DIR__ . '/../views/dashboard/index.php';
    }
}
