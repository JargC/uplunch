<?php
// ici on placera les methodes qui feront appel à la bd et qui nous 
// renverra un objet qui correspondra à l'entité qu'on souhaite avec tout ses attribut

namespace Model;

class UserRepository
{
	public function getActionWithKeyword($keyword)
	{
		$qb = $this->createQueryBuilder('a');

		$qb
		->where('a.name LIKE :keyword')
		->setParameter('keyword','%'.$keyword.'%')
		->orderBy('a.name','ASC')
		;

		return $qb->getQuery()->getResult()
		;
	}
}
