<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AttendanceRecordsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AttendanceRecordsRepository extends EntityRepository
{
	

	public function findEmpAndDate($id)
	{
		$setNull = null;
		$date = new \DateTime('now');
		$query = $this->createQueryBuilder('AR')
       ->select('IDENTITY(AR.empId)','AR.timeIn', 'AR.timeOut')
       ->andWhere('AR.empId = :id')
       ->setParameter('id', $id)
       ->andWhere('AR.timeIn > :timeIn')
       ->setParameter('timeIn', $date->format('Y-m-d 00:00:00'))
	   ->getQuery();

	   return $query->getResult();
	}
	public function findTimeOut($id)
	{
        $setNull = null;
        $date = new \DateTime('now');
        $date->setTime(0, 0, 0);

		$query = $this->createQueryBuilder('AR')
       ->select('IDENTITY(AR.empId)','AR.timeIn', 'AR.timeOut')
       ->andWhere('AR.empId = :id')
       ->setParameter('id', $id)
       ->andWhere('AR.timeIn < :timeIn')
       ->setParameter('timeIn', $date)
       ->andWhere('AR.timeOut = :timeOut')
       ->setParameter('timeOut', $setNull)
	   ->getQuery();
	   return $query->getResult();
	}
	/*
       		'ER.id',
       		'ER.firstName',
       		'ER.middleName',
       		'ER.lastName', 
       		'ER.gender',
       		'ER.address',
       		'ER.dob',
       		'ER.dateEmployement',
       		'ER.contactDetails',
       		'ER.emergencyName',
       		'ER.emergencyRelation',
       		'ER.emergencyContact',
       		'ER.status'*/
	public function searchByDate($id)
      {
            $startDate = new \DateTime($id.' 00:00:00');
            $endDate = new \DateTime($id.' 23:59:59');
            $query = $this->createQueryBuilder('AR')
            ->select(
                  'empId.firstName as firstName',
                  'empId.lastName as lastName',
                  'empId.middleName as middleName',
                  'empId.contactDetails as contactDetails',
                  'empId.address as address',
                  'empId.emergencyName as emergencyName',
                  'empId.emergencyRelation as emergencyRelation',
                  'empId.emergencyContact as emergencyContact',
                  'empId.id as valId',
                  'AR.timeIn as timeIn', 
                  'AR.timeOut as timeOut')
            ->join('AR.empId', 'empId')
            ->andWhere('AR.timeIn > :startDate')
            ->setParameter('startDate', $startDate)
            ->andWhere('AR.timeIn < :endDate')
            ->setParameter('endDate', $endDate)
            ->orderBy('AR.timeIn', 'ASC')
            ->getQuery();

         return $query->getResult();
      }
      public function SearchDateFromTo($id, $id2)
	{
		$startDate = new \DateTime($id.' 00:00:00');
            $endDate = new \DateTime($id2.' 23:59:59');
            $query = $this->createQueryBuilder('AR')
            ->select(
                  'empId.firstName as firstName',
                  'empId.lastName as lastName',
                  'empId.middleName as middleName',
                  'empId.contactDetails as contactDetails',
                  'empId.address as address',
                  'empId.emergencyName as emergencyName',
                  'empId.emergencyRelation as emergencyRelation',
                  'empId.emergencyContact as emergencyContact',
                  'empId.id as valId',
                  'AR.timeIn as timeIn', 
                  'AR.timeOut as timeOut')
            ->join('AR.empId', 'empId')
            ->andWhere('AR.timeIn BETWEEN :startDate AND :endDate')
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->orderBy('AR.timeIn', 'ASC')
            ->getQuery();

	   return $query->getResult();
	}

	public function findAllRecords()
	{
		$query = $this->createQueryBuilder('AR')
       	->select('empId.firstName as firstName','empId.lastName as lastName','empId.id as valId','AR.timeIn as timeIn', 'AR.timeOut as timeOut')
       	->join('AR.empId', 'empId')
	   	->getQuery();

	   return $query->getResult();
	}
}
