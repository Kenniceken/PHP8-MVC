<?php

function show($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function checkErrors()
{
    $errorMsg = "";
    if (isset($_SESSION['error']) && $_SESSION['error'] != "")
    {
        $errorMsg .= '<div class="text-danger p-3">
                            <span style="font-size:24px" >' . $_SESSION['error'] . '</span>
                    </div>';
    }
    unset($_SESSION['error']);
    echo $errorMsg;
}

function validateData($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}