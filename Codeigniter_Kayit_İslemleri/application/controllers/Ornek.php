<?php

class Ornek extends NP_Controller
{
	// NP_Controller sınıfının alt sınıfını PotentialCustomer olarak tanımlıyoruz

	public function __construct()
	{
		parent::__construct();


        $this->load->model("OrnekModel");
	
	}
    
    public function list()
    {
    $orneks = $this->OrnekModel->all();
    $viewData = [
        "orneks" => $orneks
    ];

    $this->setBreadcrumb(["Ornek", "Ornek Listesi"]);   

    $this->render($viewData);
    }


    public function details($ornekId)
{

        $where = [
            "ornekId" => $ornekId,
    
        ];

        $ornek = $this->OrnekModel->first($where);
        print_r($ornek);
        // Belirli koşullara göre veriyi getiren bir metodun kullanımı örneği

        // Elde edilen $ornek verisini kullanarak ilgili işlemleri gerçekleştirin
}


    public function find($ornekId)
{

        $ornek= $this->OrnekModel->first($ornekId);

        if(!$ornek) return $this->response(0,'kayıtt yokk');

        
        return $this->toJson([
            'status' => 1,
            'data' => $ornek
        ]);
 
        

}

    public function delete($ornekId)
        {
            $where = [
                "ornekId" => $ornekId
            ];

            $this->OrnekModel->delete($where);
            // Belirli koşullara göre veriyi silen bir metodun kullanımı örneği
            redirect(base_url('ornek')); // ornek sayfasına yönlendirme yapılır
            // Silme işlemi tamamlandıktan sonra gerekli işlemleri gerçekleştirin
            $this->render($where);
            
        }


   
        public function create()
        {
            // Form verilerini al
            $ornekAd = post('name');



            $ornekSoyad = post('surname');
            $ornekEmail = post('email');
        
            //********Yeni kişiyi oluşturuyoruz***********
            $data = array(
                'ornekAd' => $ornekAd,
                'ornekSoyad' => $ornekSoyad,
                'ornekEmail' => $ornekEmail
                // ********Diğer form verilerini buraya ekleyebilirsiniz********
            );
        
           
            $this->OrnekModel->insert($data);
            // ********Belirli koşullara göre veri ekleyen bir metodun kullanımı örneği********
        
            // ********Başarılı yanıt döndür********
            $response = array(
                'status' => 1,
                'message' => 'Yeni kişi oluşturuldu.'
            );
            echo json_encode($response);
        }
        



        public function update()
        {

            $ornekId = post('userId');
      
            $ornek = $this->OrnekModel->first($ornekId);
            
            if (!$ornek) {
                return $this->response(0, 'Veri bulunamadı');
            }
        
        
            $data = [
                'ornekAd'    => post('ad'),
                'ornekSoyad' => post('soyad'),
                'ornekEmail' => post('email')
            ];

            $this->OrnekModel->update($data, $ornekId); 

            return $this->toJson([
                'status' => 1,
                'data' => $ornek
            ]);
     
        }
        

    
   
}
