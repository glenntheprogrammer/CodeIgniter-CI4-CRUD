<?php

// app/Models/LogModel.php
namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table = 'tbl_logs';
    protected $primaryKey = 'LOGID';
    protected $allowedFields = [
        'USERID', 'USER_NAME', 'ACTION', 'DATELOG', 'TIMELOG',
        'user_ip_address', 'device_used', 'identifier'
    ];

    public function addLog(string $action, string $type = '')
    {
    date_default_timezone_set('Asia/Manila'); // Set to Philippine time

    $session = session();
    $this->insert([
        'USERID'          => $session->get('user_id'),
        'USER_NAME'       => $session->get('name'),
        'ACTION'          => $action,
        'DATELOG'         => date('Y-m-d'),
        'TIMELOG'         => date('H:i:s'),
        'user_ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
        'device_used'     => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
        'identifier'      => $type
    ]);
}

    // ✅ Just return the log data — no view logic here
public function getLogs()
{
    return $this->orderBy('DATELOG DESC, TIMELOG DESC')->findAll();
}

public function getLogsByDate($date)
{
    return $this->where('DATELOG', $date)
    ->orderBy('TIMELOG DESC')
    ->findAll();
}

public function getLogsByDateAndResid($date, $userId)
{
    return $this->where('DATELOG', $date)
    ->where('USERID', $userId)
    ->orderBy('TIMELOG', 'DESC')
    ->findAll();
}

public function getLogsPerMonth()
{
    return $this->db->query("
        SELECT 
            MONTH(STR_TO_DATE(DATELOG, '%Y-%m-%d')) AS month_num,
            COUNT(*) AS total_logs
        FROM tbl_logs
        WHERE DATELOG IS NOT NULL
        GROUP BY month_num
        ORDER BY month_num
    ")->getResultArray();
}

}
