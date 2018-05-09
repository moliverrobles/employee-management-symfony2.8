<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
/**
 * Employee
 *
 * @ORM\Table(name="Employee")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployeeRepository")
 */
class Employee
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * 
     * @ORM\OneToMany(targetEntity="AttendanceRecords", mappedBy="empId", orphanRemoval=true)
     */
    private $attendanceId;

    public function __construct() {
        $this->attendance = new ArrayCollection();
    }


    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="middle_name", type="string", length=255)
     */
    private $middleName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="date", nullable=true)
     */
    private $dob;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_employement", type="date", nullable=true)
     */
    private $dateEmployement;
     /**
     * @var \integer
     *
     * @ORM\Column(name="contact_details", type="string", nullable=true, length=255)
     */
    private $contactDetails;
     /**
     * @var string
     *
     * @ORM\Column(name="emergency_name", type="string",nullable=true, length=255)
     */
    private $emergencyName;
    /**
     * @var string
     *
     * @ORM\Column(name="emergency_relation", type="string",nullable=true, length=255)
     */
    private $emergencyRelation;
    /**
     * @var \integer
     *
     * @ORM\Column(name="emergency_contact", type="string", nullable=true, length=255)
     */
    private $emergencyContact;

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
     * Set firstName
     *
     * @param string $firstName
     * @return Employee
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }/**
     * Get fullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->firstName.' '.$this->lastName;
    }

    /**
     * Set middleName
     *
     * @param string $middleName
     * @return Employee
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * Get middleName
     *
     * @return string 
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Employee
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Employee
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Employee
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Employee
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set dob
     *
     * @param \DateTime $dob
     * @return Employee
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime 
     */
    public function getDob()
    {
        return $this->dob;
    }
    /**
     * Set dateEmployement
     *
     * @param \DateTime $dateEmployement
     * @return Employee
     */
    public function setDateEmployement($dateEmployement)
    {
        $this->dateEmployement = $dateEmployement;

        return $this;
    }

    /**
     * Get dateEmployement
     *
     * @return \DateTime 
     */
    public function getDateEmployement()
    {
        return $this->dateEmployement;
    }
    /**
     * Set contactDetails
     *
     * @param \string $contactDetails
     * @return Employee
     */
    public function setContactDetails($contactDetails)
    {
        $this->contactDetails = $contactDetails;

        return $this;
    }

    /**
     * Get contactDetails
     *
     * @return \string
     */
    public function getContactdetails()
    {
        return $this->contactDetails;
    }

    /**
     * Set emergencyName
     *
     * @param string $emergencyName
     * @return EmergencyName
     */
    public function setEmergencyName($emergencyName)
    {
        $this->emergencyName = $emergencyName;

        return $this;
    }

    /**
     * Get emergencyName
     *
     * @return string 
     */
    public function getEmergencyName()
    {
        return $this->emergencyName;
    }



    /**
     * Set emergencyRelation
     *
     * @param string $emergencyName
     * @return EmergencyRelation
     */
    public function setEmergencyRelation($emergencyRelation)
    {
        $this->emergencyRelation = $emergencyRelation;

        return $this;
    }

    /**
     * Get emergencyRelation
     *
     * @return string 
     */
    public function getEmergencyRelation()
    {
        return $this->emergencyRelation;
    }



    /**
     * Set emergencyContact
     *
     * @param \string $emergencyContact
     * @return EmergencyContact
     */
    public function setEmergencyContact($emergencyContact)
    {
        $this->emergencyContact = $emergencyContact;

        return $this;
    }

    /**
     * Get emergencyContact
     *
     * @return \string
     */
    public function getEmergencyContact()
    {
        return $this->emergencyContact;
    }

    /**
     * Add attendanceId
     *
     * @param \AppBundle\Entity\AttendanceRecords $attendanceId
     * @return Employee
     */
    public function addAttendanceId(\AppBundle\Entity\AttendanceRecords $attendanceId)
    {
        $this->attendanceId[] = $attendanceId;

        return $this;
    }

    /**
     * Remove attendanceId
     *
     * @param \AppBundle\Entity\AttendanceRecords $attendanceId
     */
    public function removeAttendanceId(\AppBundle\Entity\AttendanceRecords $attendanceId)
    {
        $this->attendanceId->removeElement($attendanceId);
    }

    /**
     * Get attendanceId
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAttendanceId()
    {
        return $this->attendanceId;
    }
}
