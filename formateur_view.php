<?php
session_start();

require_once("./models/quiz_builder.php");
$builder = new QuizBuilder();
$builder->startCreation();
if (!isset($_SESSION["usernameF"])) {
    header("Location: login_formateur_view.php");
}
if (isset($_POST["disconnect"])) {
    session_unset();

    header("Location: login_formateur_view.php");
}
if (isset($_POST["finished"])) {
    echo json_encode($builder->getQuiz());
}
if (isset($_POST["ajouterQcu"])) {
    $builder->createQcu($_POST["question"], $_POST["propositions"], $_POST["reponse"]);
    echo json_encode("success Qcu");
}
if (isset($_POST["ajouterQcm"])) {
    $builder->createQcm($_POST["question"], $_POST["propositions"], $_POST["reponses"]);
    echo json_encode("success Qcm");
}
if (isset($_POST["ajouterQo"])) {
    $builder->createQo($_POST["question"], $_POST["propositions"]);
    print_r(QuizBuilder::getQuiz());
    echo json_encode("success Qo");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            #creation {
                display: none;
                text-align: center;
            }

            .zone {
                max-width: 1000px;
                min-height: 500px;
                border: 1px solid black;
                margin: 5vh auto;
            }

            .zone * {
                display: block;
                margin: auto auto;
            }

            .fm {
                margin-top: 10vh;
            }
        </style>
        <title>Document</title>
    </head>

    <body>
        <script src="./jquery-3.5.1.js"></script>
        <h1>Vous etes Connectées <?php echo $_SESSION["usernameF"] ?></h1>

        <form action="./formateur_view.php" method="post">
            <input type="submit" name="disconnect" value="disconnect">
        </form>
        <div id="creation">
            <h1>Ajouter un Qo</h1>

            <div class="zone">
                <h1>Creer une question ouverte</h1>
                <form action="" onsubmit="ajouterQo(event)" class="fm">
                    <label for="question_qo">Question </label>
                    <input type="text" name="question_qo" id="question_qo">
                    <br>
                    <label for="propostion_qo">propostion </label>
                    <input type="text" name="propostion_qo" id="propostion_qo">
                    <button onclick="addPropositionQo(event)"> ajouter proposition</button>
                    <br>
                    <button type="submit">save</button>
                </form>
                <script style="display: none">
                    let propositionsQo = ""

                    const ajouterQo = (event) => {
                        event.preventDefault();
                        let question = $("#question_qo").val()
                        $.post("http://localhost/pdc/formateur_view.php", {
                            propositions: propositionsQo,
                            question: question,
                            ajouterQo: true
                        }, (data, sutatus) => {
                            console.log(data)
                        })
                    }
                    const addPropositionQo = (event) => {
                        event.preventDefault();
                        propositionsQo += ($("#propostion_qo").val() + "|")
                        $("#propostion_qo").val('')
                        console.log(propositionsQo)
                    }
                </script>
            </div>
            <div class="zone">
                <h1>Creer une question a choix unique</h1>

                <form action="" onsubmit="ajouterQcu(event)" class="fm">
                    <label for="question_qcu">Question </label>
                    <input type="text" name="question_qcu" id="question_qcu">
                    <br>
                    <label for="reponse_qcu">Reponse </label>
                    <input type="text" name="reponse_qcu" id="reponse_qcu">
                    <br>
                    <label for="proposition_qcu">propostion </label>
                    <input type="text" name="proposition_qcu" id="proposition_qcu">
                    <button onclick="addPropositionQcu(event)"> ajouter proposition</button>
                    <br>
                    <button type="submit">save</button>
                </form>
                <script style="display: none">
                    let propositionsQcu = ""

                    const ajouterQcu = (event) => {
                        event.preventDefault();
                        let question = $("#question_qcu").val()
                        let reponse = $("#reponse_qcu").val()
                        $.post("http://localhost/pdc/formateur_view.php", {
                            propositions: propositionsQcu,
                            question: question,
                            reponse: reponse,
                            ajouterQcu: true
                        }, (data, sutatus) => {
                            console.log(data)
                        })
                    }
                    const addPropositionQcu = (event) => {
                        event.preventDefault();
                        propositionsQcu += ($("#proposition_qcu").val() + "|")
                        $("#proposition_qcu").val('')
                        console.log(propositionsQcu)
                    }
                </script>
            </div>
            <div class="zone">
                <h1>Ajouter Qcm</h1>
                <form action="" onsubmit="ajouterQcm(event)" class="fm">
                    <label for="question_qcm">Question </label>
                    <input type="text" name="question_qcm" id="question_qcm">
                    <br>
                    <label for="propostion_qcm">propostions </label>
                    <input type="text" name="proposition_qcm" id="proposition_qcm"> <button onclick="addPropositionQcm(event)"> ajouter proposition</button>
                    <label for="reponse_qcm">reponses </label>
                    <input type="text" name="reponse_qcm" id="reponse_qcm">
                    <button onclick="addReponseQcm(event)"> ajouter Reponse</button>
                    <br>
                    <button type="submit">save</button>
                </form>
                <script style="display: none">
                    let propositionsQcm = ""
                    let reponsesQcm = ""
                    const ajouterQcm = (event) => {
                        event.preventDefault();
                        let question = $("#question_qcm").val()
                        $.post("http://localhost/pdc/formateur_view.php", {
                            propositions: propositionsQcm,
                            reponses: reponsesQcm,
                            question: question,
                            ajouterQcm: true
                        }, (data, sutatus) => {
                            console.log(data)
                        })
                    }
                    const addPropositionQcm = (event) => {
                        event.preventDefault();
                        propositionsQcm += ($("#proposition_qcm").val() + "|")
                        $("#proposition_qcm").val('')
                        console.log(propositionsQcm)
                    }
                    const addReponseQcm = (event) => {
                        event.preventDefault();
                        reponsesQcm += ($("#reponse_qcm").val() + "|")
                        $("#reponse_qcm").val('')
                        console.log(reponsesQcm)
                    }
                </script>
            </div>
        </div>
        <button id="clc" onclick="showZoneCreation()">Create new Quiz</button>
        <script>
            const showZoneCreation = () => {
                document.getElementById("creation").style.display = "block"
                document.getElementById("clc").style.display = "none"
            }
        </script>
    </body>

    </html>
<?php
}
?>