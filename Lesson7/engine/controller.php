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
    if (is_auth()) {
        $params['allow'] = true;
        $params['user'] = get_user();
    }

    switch ($page) {

        case 'login':
            //проверка логина и пароля

            auth($_POST['login'],$_POST['pass']);

            header("Location: /");
            break;

        case 'logout':

            session_destroy();
            setcookie("hash");
            header("Location: /");
            break;

        case 'news':

            $params["news"] = getNews();

            break;

        case 'newspage':
            //пример асинхронного обработчика лайков к новостям
            if ($action=="addlike") {
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
        case 'basket':
            doBasketAction($id);
            $params['basket'] = getAllBasket();
            break;
        case 'catalog':
            doGoodsAction($id);
            $params['goods'] = getAllGoods();
            break;

        case 'item':
            var_dump($id);
            doGoodsAction($id);
            $params['good'] = getOneGood($id);
            break;
    }
    $params['count'] = getCountBasket();

    return $params;
}





