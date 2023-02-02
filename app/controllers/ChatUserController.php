<?php
class ChatUserController extends BaseChatController
{
    private $chatUserModel;

    public function __construct()
    {
        $this->loadModel('ChatUserModel');
        $this->chatUserModel = new ChatUserModel;
    }


    public function list()
    {
        $currentUser = $_SESSION['unique_id'];

        $this->renderView('chat.user.list', array(
            'currentUser' => $currentUser,
        ));
    }


    public function actionGetList()
    {
        $output = '';

        if (isset($_SESSION['unique_id'])) {
            $currentUser = $_SESSION['unique_id'];

            $users = $this->chatUserModel->findByAttribute(array(
                    'where' => 'NOT unique_id = "' . $currentUser . '"'
                )
            );

            if (count($users) > 0) {
                $output .= $this->renderUserItem($users, $currentUser);
            } else {
                $output = 'No users are available to chat';
            }
        } else {
            $output = 'Something is wrong!';
        }

        echo $output;
    }

    public function actionSearch()
    {
        if (isset($_SESSION['unique_id'])) {
            $currentUser = $_SESSION['unique_id'];

            if ($_POST) {
                $keyword = $this->chatUserModel->escape($_POST['searchTerm']);  ///form eke balanna post eka KEYWORD

                $options = array(
                    'where' => 'NOT unique_id = ' . $currentUser . ' 
                                AND (fname LIKE "%' . $keyword . '%" 
                                    OR lname LIKE "%' . $keyword . '%")',
                    'order_by' => 'user_id DESC'
                );

                $users = $this->chatUserModel->findByAttribute($options);

                $output = "";

                if (count($users) > 0) {
                    $output .= $this->renderUserItem($users, $currentUser);
                } else {
                    $output .= 'No user found related to your search keyword';
                }
            } else {
                $output = 'Something is wrong!';
            }
        } else {
            $output = 'Something is wrong!';
        }
        echo $output;
    }

    /**
     * Render user item element
     * @param $users
     * @param $currentUser
     * @return string
     */
    public function renderUserItem($users, $currentUser)
    {
    
        $chatModel = new ChatController();
        $output = '';

        foreach ($users as $user) {
            $chat = $chatModel->getChat(
                array(
                    'order_by' => 'msg_id DESC',
                    'limit' => 1,
                    'where' => '(incoming_msg_id = ' . $user['unique_id'] . ' 
                                OR outgoing_msg_id = ' . $user['unique_id'] . ') 
                                AND (outgoing_msg_id = ' . $currentUser. ' 
                                    OR incoming_msg_id = ' . $currentUser. ')',
                )
            );

            $result = count($chat) > 0 ? $chat[0]['msg'] : 'No message available'; //meke [0] enwda ndda sure na
            $message = strlen($result) > 28 ? substr($result, 0, 28) . '...' : $result;

            $yourTag = '';
            if (isset($chat[0]['outgoing_msg_id'])) {
                $yourTag = $currentUser == $chat[0]['outgoing_msg_id'] ? "You: " : "";
            }

            //set class html
            $status = $user['status'] == ChatUserModel::USER_OFF ? 'Offline now' : 'Active now';

            $output .= $this->renderPartial('chat.user.partial.user_item', array(
                'user' => $user,
                'message' => $message,
                'yourTag' => $yourTag,
                'status' => $status
            ));
        }
        return $output;
    }

    /**
     * @param $user_id
     * @return array|void
     */
    public function getUserByUID($user_id)
    {
        return $this->chatUserModel->findByAttribute(array(
            'where' => 'unique_id=' . $user_id,
        ));
    }
}