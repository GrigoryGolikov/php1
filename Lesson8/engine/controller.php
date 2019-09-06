<?php

//Файл с функциями нашего движка

/*
 * Функция подготовки переменных для передачи их в шаблон
 */
function prepareVariables($page, $action, $id)
{
//Для каждой страницы готовим массив со своим набором переменных
//для подстановки их в соотвествующий шаблон
    $params = [];
    $params['allow'] = false;
    $params['admin'] = false;
    if (is_auth()) {
        $params['allow'] = true;
        $params['user'] = get_user();
        $params['admin'] = $params['user'] =="admin";
        var_dump($params['admin'] );
    }
    $params['count'] = getBasketCount();
    switch ($page) {

        case 'login':
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            if (!auth($login, $pass)) {
                Die('Не верный логин пароль');
            } else {
                if (isset($_POST['save'])) {
                    makeHashAuth();
                }
            }
            header("Location: /");
            break;

        case 'logout':
            session_destroy();
            setcookie("hash", "", time() - 3600, "/");
            header("Location: /");
            break;

        case 'news':

            $params["news"] = getNews();

            break;

        case 'newspage':
            //пример асинхронного обработчика лайков к новостям
            if ($action == "addlike") {
                //обращаемся к модели и ставим лайк
                $result = addNewsLike($id);
                echo json_encode(["result" => $result]);
            }

            $content = getNewsContent($id);
            $params['prev'] = $content['prev'];
            $params['text'] = $content['text'];
            break;

        case 'feedback':

            doFeedbackAction($params, $action, $id);

            $params['feedback'] = getAllFeedback();

            break;

        case 'catalog':

            $params['goods'] = getAllGoods();
            break;

        case 'item':
            $params['good'] = getOneGood($id);
            break;

        case "basket":

            $params['basket'] = getBasket();
            $params['summ'] = summFromBasket();

            break;


        case 'api':
            if ($action == "buy") {
                $data = json_decode(file_get_contents('php://input'));
                $id = (int)$data->id;

                addToBasket($id);
                $params['count'] = getBasketCount();

                header("Content-type: application/json");
                echo json_encode($params);
                die();
            }
            if ($action == "deleteFromBasket") {
                $data = json_decode(file_get_contents('php://input'));
                $id = (int)$data->id;

                deleteFromBasket($id);

                $params['count'] = getBasketCount();
                $params['summ'] = summFromBasket();
                $params['id'] = $id;

                header("Content-type: application/json");
                echo json_encode($params);
                die();
            }
    }

    return $params;
}





