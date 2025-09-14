<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('partials/navbar');
        $this->load->view('admin/dashboard');
        $this->load->view('partials/footer');
    }

    private function redirectIfUnauthorized()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    private function prepareUserData()
    {
        $user_id = $this->session->userdata('id');
        $user_data = $this->User->getUserById($user_id);
        $is_logged_in = $this->session->userdata('logged_in');
        $user_role = $this->session->userdata('role');

        $this->data['user_data'] = $user_data;
        $this->data['is_logged_in'] = $is_logged_in;
        $this->data['role'] = $user_role;
    }
    // Function for charts
    public function getBarchartData()
    {
        $data = $this->Research->getBarchartData();
        echo json_encode($data);
    }


    // Charts Data Backend

    public function getChartData()
    {
        $year = $this->input->get('year') ?? date('Y'); // Default to current year
        $data = $this->Research_model->getMonthlyResearchData($year);

        // Organize data for Chart.js
        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        // Initialize chart data structure
        $chartData = [
            'labels' => $months,
            'datasets' => [
                [
                    'label' => 'Proposal',
                    'data' => array_fill(0, 12, 0),
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                ],
                [
                    'label' => 'Evaluation',
                    'data' => array_fill(0, 12, 0),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1,
                ],
                [
                    'label' => 'Ongoing',
                    'data' => array_fill(0, 12, 0),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
                [
                    'label' => 'Completed',
                    'data' => array_fill(0, 12, 0),
                    'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                    'borderColor' => 'rgba(153, 102, 255, 1)',
                    'borderWidth' => 1,
                ],
            ]
        ];

        // Populate chart data from database results
        foreach ($data as $row) {
            $monthIndex = array_search($row['month'], $months); // Find the month index
            if ($monthIndex !== false) {
                switch (strtolower($row['type'])) { // Ensure type comparison is case-insensitive
                    case 'proposal':
                        $chartData['datasets'][0]['data'][$monthIndex] = (int) $row['total'];
                        break;
                    case 'evaluation':
                        $chartData['datasets'][1]['data'][$monthIndex] = (int) $row['total'];
                        break;
                    case 'ongoing':
                        $chartData['datasets'][2]['data'][$monthIndex] = (int) $row['total'];
                        break;
                    case 'completed':
                        $chartData['datasets'][3]['data'][$monthIndex] = (int) $row['total'];
                        break;
                }
            }
        }

        // Return the chart data as JSON
        header('Content-Type: application/json');
        echo json_encode($chartData);
    }
}
