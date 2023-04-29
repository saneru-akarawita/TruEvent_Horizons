<?php

class ChatController extends BaseChatController
{
    private $chatModel;

    public function __construct()
    {
        $this->loadModel('ChatModel');
        $this->chatModel = new ChatModel;
    }

    public function index()
    {
        $currentUser = $_SESSION['unique_id'];

        if (!empty($_GET['user_id'])) {
            $userId = $this->chatModel->escape($_GET['user_id']);
            $user = new ChatUserController();
            $userDetail = $user->getUserByUID($userId);

            if (count($userDetail) > 0) {
                self::renderView('chat.chat.index', array(
                    'currentUser' => $currentUser,
                    'user_detail' => $userDetail[0],
                ));
            } else {
                header("location:" .URLROOT. "app/views/".Session::getUser('typeText')."/chat/user/list"); //check location path
            }
        } else {
            header("location:" .URLROOT. "app/views/".Session::getUser('typeText')."/chat/user/list");
        }
    }

    /**
     * @param $option
     * @return array|void
     */
    public function getChat($option)
    {
        return $this->chatModel->findByAttribute($option);
    }

    public function actionAddChatItem()
    {
        if ($_POST) {
            $currentUser = $_SESSION['unique_id'];
            $incomingId = $this->chatModel->escape($_POST['incoming_id']); //check post vaalues name in the form
            $message = $this->chatModel->escape($_POST['message']);

            $model = array(
                'outgoing_msg_id' => $currentUser,
                'incoming_msg_id' => $incomingId,
                'msg' => $message,
            );

            $result = $this->chatModel->store($model);
        }
    }

    public function actionGetChatItem()
    {
        if ($_POST) {        
            $currentUser = $_SESSION['unique_id'];
            $incomingId = $this->chatModel->escape($_POST['incoming_id']);
            // $chatUserID = $this->chatModel->escape($_POST['chat_user_id']); // check form names for these too

            $model = array(
                'join' => 'chat_users as u ON u.unique_id = incoming_msg_id',
                'where' => '(outgoing_msg_id = ' . $currentUser . ' AND incoming_msg_id = ' . $incomingId . ')
                    OR (outgoing_msg_id = ' . $incomingId . ' AND incoming_msg_id = ' . $currentUser . ')',
                'order_by' => 'chat_messages.msg_id',
            );

            $result = $this->chatModel->findByAttribute($model);
            $image = $this->chatModel->getImgFromReciever($incomingId);

            $output = '';
            if (count($result) > 0) {
                foreach ($result as $item) {
                    if ($item['outgoing_msg_id'] == $currentUser) {
                        $output .= $this->renderPartial('chat.chat.partial.left_chat_item', array(
                            'item' => $item
                        ));
                    } else {
                        $output .= $this->renderPartial('chat.chat.partial.right_chat_item', array(
                            'item' => $item,
                            'image' => $image[0],
                        ));
                    }
                }
            } else {
                $output .= $this->renderPartial('chat.chat.partial.not_message');
            }
    
            return $output;
        }
    }
}