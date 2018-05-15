<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Employee;
use AppBundle\Entity\User;
use AppBundle\Entity\AttendanceRecords;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * employee controller.
 *
 * @Route("employee-management")
 */
class EmployeeController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('employee/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
    /**
     * @Route("/", name="show_users")
     * @Method("GET")
     */
    public function usersAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:User')->showUserInfo();

        return $this->render('employee/users-all.html.twig', array(
            'user' => $users,
        ));
    }
    /**
     * Lists all employee entities.
     *
     * @Route("/show-employees", name="show_employees")
     * @Method("GET")
     */
    public function employeesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $employees = $em->getRepository('AppBundle:Employee')->showEmployees();

        return $this->render('employee/employee-all.html.twig', array(
            'employees' => $employees,
        ));
    }
    /**
     * Finds and displays a employee entity.
     *
     * @Route("/show-employee/{id}", name="show_employee")
     */
    public function showEmployeeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $employee = $em->getRepository('AppBundle:Employee')->find($id);


        return $this->render('employee/employee-show.html.twig', array(
            'employee' => $employee,
        ));
    }


    /**
     * Creates a new employee entity.
     *
     * @Route("/new-employee", name="new_employee")
     * @Method({"GET", "POST"})
     */
    public function newEmployeeAction(Request $request)
    {
        $employee = new Employee();
        $form = $this->createForm('AppBundle\Form\EmployeeType', $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($employee);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Your new employee entry has been created.');
            return $this->redirectToRoute('show_employee', array('id' => $employee->getId()));
        }

        return $this->render('employee/employee-new.html.twig', array(
            'employee' => $employee,
            'form' => $form->createView(),
            
        ));
    }

    /**
     * Displays a form to edit an existing crudetest entity.
     *
     * @Route("/edit-employee/{id}", name="edit_employee")
     * @Method({"GET", "POST"})
     */
    public function editEmployeeAction(Request $request, Employee $employee)
    {
        $editForm = $this->createForm('AppBundle\Form\EmployeeType', $employee);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Your edit has been saved.'); 
            return $this->redirectToRoute('show_employee', array('id' => $employee->getId()));
        }

        return $this->render('employee/employee-edit.html.twig', array(
            'employee' => $employee,
            'editForm' => $editForm->createView(),
        ));
    }
     /**
     * Finds and displays a crudetest entity.
     *
     * @Route("/employee-delete/{id}/", name="employee_delete")
     * @Method("GET")
     */
    public function deleteEmployeeAction(Employee $id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($id);
        $em->flush();
    }

     /**
     * Finds and displays a crudetest entity.
     *
     * @Route("/user-delete/{id}/", name="user_delete")
     * @Method("GET")
     */
    public function deleteUserAction(User $id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($id);
        $em->flush();
    }

    /**
     * Lists all employee entities.
     *
     * @Route("/attendance-records/{id}", name="attendance_records")
     */
    public function attendanceRecordAction($id)
    {
        $attendanceRecord = new AttendanceRecords();
        $form = $this->createForm('AppBundle\Form\SearchAttendanceRecordsType', $attendanceRecord);
        $formInsert = $this->createForm('AppBundle\Form\insertAdminTimeInAndOutType', $attendanceRecord);


        $em = $this->getDoctrine()->getManager();
        $employeesRecords = $em->getRepository('AppBundle:AttendanceRecords')->SearchByDate($id);
        return $this->render('employee/attendance-records.html.twig', array(
            'attendanceRecord' =>  $attendanceRecord,
            'form' => $form->createView(),
            'formInsert' => $formInsert->createView(),
            'employeesRecords' => $employeesRecords,
            'date' => $id,
            'dateTo' => null,
            'dateFrom' => null,
        ));
    }

    /**
     * Lists all employee entities.
     *
     * @Route("/attendance-records-search/{id}/{id2}", name="attendance_records_search")
     */
    public function attendanceRecordSearchFromToAction($id, $id2)
    {
        $attendanceRecord = new AttendanceRecords();
        $form = $this->createForm('AppBundle\Form\SearchAttendanceRecordsType', $attendanceRecord);
        $formInsert = $this->createForm('AppBundle\Form\insertAdminTimeInAndOutType', $attendanceRecord);

        $em = $this->getDoctrine()->getManager();
        $employeesRecords = $em->getRepository('AppBundle:AttendanceRecords')->SearchDateFromTo($id, $id2);
        return $this->render('employee/attendance-records.html.twig', array(
            'attendanceRecord' =>  $attendanceRecord,
            'form' => $form->createView(),
            'formInsert' => $formInsert->createView(),
            'employeesRecords' => $employeesRecords,
            'date' => 'today',
            'dateTo' => $id2,
            'dateFrom' => $id,
        ));
    }

    /**
     * 
     *
     * @Route("/edit-employee-Attendance/{id}/{exId}", name="edit_employee_attendance")
     */
    public function editEmployeeAttendanceAction(Request $request, AttendanceRecords $exId, $id)
    {

        
        $em = $this->getDoctrine()->getManager();
        $employee = $em->getRepository(AttendanceRecords::class)->findBy(array(
            'id' => $exId, 'empId' =>$id));

        $form = $this->createForm('AppBundle\Form\EditTimeInAndOutType', $exId);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        }
        return $this->render('employee/attendance-records-edit.html.twig', array(
            'employee' => $employee,
            'form' => $form->createView(),
        ));
    }/*admin_insert_attendance*/



    /**
     * @Route("/admin-insert-attendance/{id}/{tI}/{tO}", name="admin_insert_attendance")
     * @METHOD("GET")
     */
    public function adminInsertAttendanceAction($id,$tI,$tO)
    {

        $timeIn = new \DateTime($tI);
        if($tO == 'empty'){
            $timeOut = null;
        }else{
            $timeOut = new \DateTime($tO);
        }
        /*
        $timeOut = new \DateTime($tO);*/
        $em = $this->getDoctrine()->getManager();

        $checkEmployeeEntry = $em->getRepository(AttendanceRecords::class)->findRecord($id,$tI);

        if(!$checkEmployeeEntry){
            $empId = $em->getReference(AttendanceRecords::class, $id);
            $insertRecord = new AttendanceRecords();
            $insertRecord->setEmpId($empId);

            $insertRecord->setTimeIn($timeIn);
            $insertRecord->setTimeOut($timeOut);
           
            $insertRecord->setRemark('Admin');

            $em->persist($insertRecord);
            $em->flush();
        }

        $attendanceRecord = new AttendanceRecords();
        $form = $this->createForm('AppBundle\Form\SearchAttendanceRecordsType', $attendanceRecord);
        $formInsert = $this->createForm('AppBundle\Form\insertAdminTimeInAndOutType', $attendanceRecord);

        $em = $this->getDoctrine()->getManager();
        $employeesRecords = $em->getRepository('AppBundle:AttendanceRecords')->searchByDate($tI);
        return $this->render('employee/attendance-records.html.twig', array(
            'attendanceRecord' =>  $attendanceRecord,
            'form' => $form->createView(),
            'formInsert' => $formInsert->createView(),
            'employeesRecords' => $employeesRecords,
            'date' => $tI,
            'dateTo' => null,
            'dateFrom' => null,
        ));

    }

     /**
     * 
     *
     * @Route("/attendance-delete/{id}/", name="delete_employee_attendance")
     * @Method("GET")
     */
    public function deleteAttendanceEntryAction(AttendanceRecords $id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($id);
        $em->flush();
    }
}
