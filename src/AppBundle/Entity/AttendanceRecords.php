<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AttendanceRecords
 *
 * @ORM\Table(name="attendance_records")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AttendanceRecordsRepository")
 */
class AttendanceRecords
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Employee", inversedBy="attendanceId")
     * @ORM\JoinColumn(name="emp_id", referencedColumnName="id")
     */
    private $empId;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time_in", type="datetime", nullable=true)
     */
    private $timeIn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time_out", type="datetime", nullable=true)
     */
    private $timeOut;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set empId
     *
     * @param integer $empId
     * @return AttendanceRecords
     */
    public function setEmpId($empId)
    {
        $this->empId = $empId;

        return $this;
    }

    /**
     * Get empId
     *
     * @return integer 
     */
    public function getEmpId()
    {
        return $this->empId;
    }

    /**
     * Set timeIn
     *
     * @param \DateTime $timeIn
     * @return AttendanceRecords
     */
    public function setTimeIn($timeIn)
    {
        $this->timeIn = $timeIn;

        return $this;
    }

    /**
     * Get timeIn
     *
     * @return \DateTime 
     */
    public function getTimeIn()
    {
        return $this->timeIn;
    }

    /**
     * Set timeOut
     *
     * @param string $timeOut
     * @return AttendanceRecords
     */
    public function setTimeOut($timeOut)
    {
        $this->timeOut = $timeOut;

        return $this;
    }

    /**
     * Get timeOut
     *
     * @return string 
     */
    public function getTimeOut()
    {
        return $this->timeOut;
    }
}
