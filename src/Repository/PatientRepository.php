<?php

namespace App\Repository;

use App\Entity\Patient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\Request;


/**
 * @method Patient|null find($id, $lockMode = null, $lockVersion = null)
 * @method Patient|null findOneBy(array $criteria, array $orderBy = null)
 * @method Patient[]    findAll()
 * @method Patient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatientRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Patient::class);
	}
    
    public function findOneByDateJoinedToRendezVous(\DateTime $date1, \DateTime $date2)
	{
		return $this->createQueryBuilder('p')
			->add('select', 'p')
			->leftJoin('p.rendezVous', 'rd')
			->where('rd.date >= :date1')
			->andWhere('rd.date <= :date2')
			->setParameter('date1', $date1)
			->setParameter('date2', $date2)
			->getQuery()
			->getResult();
    }

	public function findOneByDateJoinedToEntretien(\DateTime $date1, \DateTime $date2)
	{
		return $this->createQueryBuilder('p')
			->add('select', 'p')
			->leftJoin('p.entretiens', 'e')
			->where('e.date >= :date1')
			->andWhere('e.date <= :date2')
			->setParameter('date1', $date1)
			->setParameter('date2', $date2)
			->getQuery()
			->getResult();
    }
    
    public function findOneByDateJoinedToAtelier(\DateTime $date1, \DateTime $date2)
	{
		return $this->createQueryBuilder('p')
			->add('select', 'p')
			->leftJoin('p.ateliers', 'a')
			->where('a.date >= :date1')
			->andWhere('a.date <= :date2')
			->setParameter('date1', $date1)
			->setParameter('date2', $date2)
			->getQuery()
			->getResult();
    }
    
    public function findOneByDateJoinedToTelephonique(\DateTime $date1, \DateTime $date2)
	{
		return $this->createQueryBuilder('p')
			->add('select', 'p')
			->leftJoin('p.telephoniques', 't')
			->where('t.date >= :date1')
			->andWhere('t.date <= :date2')
			->setParameter('date1', $date1)
			->setParameter('date2', $date2)
			->getQuery()
			->getResult();
    }
    
    public function compte()
    {
        return $this->createQueryBuilder('p')
                    ->select('COUNT(p)')
                    ->getQuery()
                    ->getSingleScalarResult();
    }

    public function findByFilter($sort, $searchPhrase)
    {
        $qb = $this->createQueryBuilder('p');

        if ($searchPhrase != "") {
            $qb->andWhere('p.dentree LIKE :search
                OR p.etp LIKE :search
                OR p.nom LIKE :search
                OR p.prenom LIKE :search
                OR p.motif LIKE :search
            ')
                ->setParameter('search', '%' . $searchPhrase . '%');
        }
        if ($sort) {
            foreach ($sort as $key => $value) {
                $qb->orderBy('p.' . $key, $value);
            }
        } else {
            $qb->orderBy('p.dentree', 'ASC');
        }
        return $qb;
    }

//    /**
//     * @return Patient[] Returns an array of Patient objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Patient
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
