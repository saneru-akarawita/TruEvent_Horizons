<?php

class BaseChatController
{
    const VIEW_PATH = '../app/views';
    const MODEL_PATH = '../app/models';

    /**
     * index
     */
    public function index()
    {
        self::renderView(Session::getUser('typeText').'.chat.index');
    }

    /**
     * Path name - get after View folder
     * @param $viewPath
     * @param array $data
     */
    public function renderView($viewPath, array $data = [])
    {
        $this->renderPartial('chat.partial.header');
        $this->renderPartial($viewPath, $data);
        $this->renderPartial('chat.partial.footer');
    }

    /**
     * Render partial file
     * @param $partialPath
     * @param array $data
     */
    public function renderPartial($partialPath, array $data = [])
    {
        //get data
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        $usertype ="";

        switch (Session::getUser('typeText')) {
            case "Admin":
                $usertype ="admin";
              break;
            case "Customer":
                $usertype ="customer";
              break;
            case "Hotel Manager":
                $usertype ="hotelManager";
              break;
            case "Deco Company":
                $usertype ="decoCompany";
              break;
            case "Band Manager":
                $usertype ="band";
              break;
            case "Photography Company":
                $usertype ="photography";
              break;
              
            default:
                $usertype ="";
          }

        $viewPathFile = self::VIEW_PATH . '/' .$usertype. '/'. str_replace('.', '/', $partialPath) . '.php';
        require $viewPathFile;
    }

    /**
     * @param $modelPath
     */
    protected function loadModel($modelPath)
    {
        $modelPathFile = self::MODEL_PATH . '/' . str_replace('.', '/', $modelPath) . '.php';
        require $modelPathFile;
    }
}