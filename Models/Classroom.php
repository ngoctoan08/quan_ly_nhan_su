<?php
include_once './configs/Connect.php';
class Classroom extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */

    public function showAllocateClassroom()
    {
        $sql = "SELECT classrooms.*, rooms.name as 'room_name', rooms.place as 'place_name', courses.name as 'course_name' FROM `classrooms` JOIN rooms on classrooms.room_id = rooms.id JOIN courses on courses.id = classrooms.course_id";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function addClassroom($roomId, $courseId, $day, $startTime, $endTime)
    {   
        $sql = "INSERT INTO `classrooms` (`id`, `room_id`, `course_id`, `day`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES (NULL, :room_id, :course_id, :day, :start_time, :end_time, current_timestamp(), current_timestamp())";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':room_id', $roomId);
        $pre->bindParam(':course_id', $courseId);
        $pre->bindParam(':day', $day);
        $pre->bindParam(':start_time', $startTime);
        $pre->bindParam(':end_time', $endTime);
        return $pre->execute();
    }

    public function updateroom($id, $name, $start_date, $end_date, $avatar, $description, $room_duration)
    {
        $sql = "UPDATE `rooms` SET rooms.name = :name, rooms.start_date = :start_date, rooms.end_date = :end_date, rooms.avatar = :avatar, rooms.description = :description, rooms.room_duration = :room_duration WHERE rooms.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':description', $description);
        $pre->bindParam(':avatar', $avatar);
        $pre->bindParam(':start_date', $start_date);
        $pre->bindParam(':end_date', $end_date);
        $pre->bindParam(':room_duration', $room_duration);
        return $pre->execute();
    }
    
    
    public function deleteroom($id)
    {
        $sql = "DELETE FROM rooms WHERE rooms.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        return $pre->execute();
    }
    
    public function returnLastId()
    {
        return $this->pdo->lastInsertId();
    }

   

}