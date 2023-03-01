<?php
namespace App\Controller;

use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class StudentController extends AbstractController {

    #[Route('/welcome')]
    public function index(){
        return new Response("Bonjour 3A19/3A20");
    }

    public function index1(){
        return new Response("Bonjour index 1");
    }

    #[Route('/welcome/{name}/{para2}')]
    public function indexPara($name,$para2){
        return new Response("Bonjour ".$name.' '.$para2);
    }

    #[Route('/Student', name: 'app_classroom')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Student::class);
        $cStudent=$repo->findAll();
        return $this->render('Student/index.html.twig', [
            'controller_name' => 'StudentController',
            'Student'=>$Student
        ]);
    }
    
    #[Route('Student/delete/{id}',name: 'Student_delete')]
    public function deleteClassroom($id,ClassroomRepository $repo){
        $Student = $repo->find($id);
        $repo->remove($Student,true);
        return $this->redirectToRoute('app_Student');
    }
    
    #[Route('/addStudent',name: 'Student_add')]
    public function addStudent(StudentRepository $repo,ManagerRegistry $doctrine){
        $cStudent = new Student();
        $Student->setUsername('3A21');
        $Student->setEmail('3A21@esprit.tn');
        $entitymanager=$doctrine->getManager();
        $entitymanager->persist($Student);
        $entitymanager->flush();
        return $this->redirectToRoute('app_Student');
    }

    #[Route('/updateStudent/{id}',name: 'Student_update')]
    public function updateStudent($id,StudentRepository $repo,ManagerRegistry $doctrine){
        $Student = $repo->find($id);
        $Student->setUsername('Student updated');
        $entitymanager = $doctrine->getManager();
        $entitymanager->flush();
        return $this->redirectToRoute('app_Student');
    }

}
?>