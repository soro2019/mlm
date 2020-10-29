<!-- // private function compte_filleuls($parrain, $matrice)
        // {
        //     $filleuls = $this->Crud_model->select_filleuls($parrain, $matrice);
        //     if($filleuls['pseudo_filleulGauche'] == "")
        //     {
        //         return 0;
        //     }
        //     elseif($filleuls['pseudo_filleulDroit'] == "")
        //     {
        //         return 1;
        //     }
        //     else{
        //         return 2;
        //     }
        // }

        // private function compte_descendants($parrain, $matrice)
        // {
        //     $nb = 0;
        //     $parrains_a_compter = array();
        //     do{
        //         $filleuls = $this->Crud_model->select_filleuls($parrain, $matrice);
        //         if($filleuls['pseudo_filleulGauche'] != "")
        //         {
        //             array_push($parrains_a_compter, $filleuls['pseudo_filleulGauche']);
        //         }
        //         if($filleuls['pseudo_filleulDroit'] != "")
        //         {
        //             array_push($parrains_a_compter, $filleuls['pseudo_filleulDroit']);
        //         }
        //         $parrain = array_shift($parrains_a_compter);
        //         $nb+=$this->compte_filleuls($parrain, $matrice);

        //     }while(count($parrains_a_compter) != 0);
        //     return $nb;
        // }

        // private function choix_filleul($fg, $fd, $niveau)
        // {
        //   return $this->compte_descendants($fg, $niveau) >= $this->compte_descendants($fg, $niveau) ? $fg : $fd;
        // }

        // private function definir_parrain_de_matrice($pseudo_user,$parrain,$matrice)
        // {
        //     $filleuls = $this->Crud_model->select_filleuls($parrain,$matrice);
        //     //var_dump($filleuls['pseudo_filleulGauche']);die;
        //     if($filleuls['pseudo_filleulGauche'] == "")
        //     {
        //         ////mettre comme filleulGauche
        //         // Insérer une donnée dans la table "mytable"

        //         $data_parrain = array(
        //             'pseudo_filleulGauche' => $pseudo_user);
        //         $this->db->where(array('pseudo_user' => $parrain, 'niveau' => $matrice));
        //         $this->db->update('matrices', $data_parrain); 
        //     }
        //     elseif($filleuls['pseudo_filleulDroit'] == "")
        //     {
        //         ////insertion comme filleulDroit
        //         $data_parrain = array(
        //             'pseudo_filleulDroit' => trim($pseudo_user));
        //         $this->db->where(array('pseudo_user' => $parrain, 'niveau' => $matrice));
        //         $this->db->update('matrices', $data_parrain); 
        //     }
        //     else{
        //         ////prendre celui qui a le moins de descandants
        //         $filleulChoisis = $this->choix_filleul($filleuls['pseudo_filleulGauche'],$filleuls['pseudo_filleulDroit'], $matrice);
        //         $this->definir_parrain_de_matrice($pseudo_user, $filleulChoisis, $matrice);
        //     }

        // } -->