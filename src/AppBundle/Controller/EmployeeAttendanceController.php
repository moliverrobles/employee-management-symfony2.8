<?php
// src/AppBundle/Controller/RegistrationController.php
namespace AppBundle\Controller;
use AppBundle\Entity\Employee;
use AppBundle\Entity\AttendanceRecords;
use AppBundle\Form\EmployeeAttendanceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class EmployeeAttendanceController extends Controller
{
    /**
     * @Route("/employee-management/employee-attendance", name="employee_attendance")
     */
    public function employeeAttendanceAction(Request $request)
    { 
      
        $attendanceRecord = new AttendanceRecords();
        $form = $this->createForm('AppBundle\Form\EmployeeAttendanceType', $attendanceRecord);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $employee = $em->getRepository('AppBundle:AttendanceRecords')->findAll();

        return $this->render('employee/employee-attendance.html.twig', array(
            'attendanceRecord' =>  $attendanceRecord,
            'form' => $form->createView(),
            'employee' => $employee,
            )
        );
    }

    /**
     * @Route("/employee-management/employee-attendance/time-in/{id}", name="time_in")
     * @METHOD("GET")
     */
    public function timeInAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $checkEmployeeEntry = $em->getRepository(AttendanceRecords::class)->findEmpAndDate($id);

        if(!$checkEmployeeEntry){

            $item = $em->getReference(AttendanceRecords::class, $id);
            $employeeTimeIn = new AttendanceRecords();
            $employeeTimeIn->setEmpId($item);

            $d = new \DateTime('now');
            $date = $d->format('Y-m-d');

            $timeInDate = new \DateTime('now');
            $employeeTimeIn->setTimeIn($timeInDate);
            $employeeTimeIn->setTimeOut(null);

            $em->persist($employeeTimeIn);
            $em->flush();
        }
    }
    /**
     * @Route("/employee-management/employee-attendance/time-out/{id}", name="time_out")
     * @METHOD("GET")
     */
    public function timeOutAction($id)
    {
        $em = $this->getDoctrine()->getManager();/*
        $employeeTimeOut = $em->getRepository(AttendanceRecords::class)->findTimeOut($id);*/
        $employeeTimeOut = $em->getRepository(AttendanceRecords::class)->findOneBy(array(
            'empId' => $id,
            'timeOut' => null
        ));
        if($employeeTimeOut){
            $timeOutDate = new \DateTime();
            
            $employeeTimeOut->setTimeOut($timeOutDate);
            $em->flush();   
        };

    }
}