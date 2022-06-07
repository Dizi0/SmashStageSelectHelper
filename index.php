<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Smash Ultimate Stage Selector</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
<div class="row">
    <div class="col-md-6">

        <div class="searchbox">
            <div class="thumbnail">
                <img src="./StageImages/random_big.png" alt="">
            </div>
            <div class="inputbox">
                <input name="searchTxt" type="text" maxlength="512" id="searchTxt" class="searchField" placeholder="Insert Stage name"/>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <br>
        <div class="content">

            <div class="legend">
                Stage Selection Helper
            </div>
            <div class="stageList" id="stagelist">

                <?php
                $json = file_get_contents('./stagelist.json');
                $stages = json_decode($json, true);
                $counter = 0;
                foreach ($stages as $index => $stage) {
                    ?>
                    <div id="stage-<?= $stage['id']?>" data-name="<?= $stage['name']?>" class="stage" style="background:url('<?= $stage['thumbnail_url'] ?>')"></div>

                    <?php
                    if ($counter == 11 ) {
                        echo "<br>";
                        $counter = 0;
                    } else {
                        $counter++;
                    }
                }
                ?>

            </div>
        </div>
    </div>
</div>
<script>
    // let stagelist = document.getElementById('stagelist')
    const stagelist = document.querySelectorAll(`[id^="stage-"]`);
    let stagelistArr = []
    stagelist.forEach(stage => {
        let currentStage = {'id' :stage.id , 'name' : stage.dataset.name }
        stagelistArr.push(currentStage)
    })

    function searchURL() {
        let txt = searchTxt.value;
        if(txt !== '') {
            stagelistArr.forEach(stage => {
                document.getElementById(stage.id).classList.remove("highlighted")
                if (stage.name.toLowerCase().normalize("NFKD").replace(/[\u0300-\u036f]/g, "").includes(txt.toLowerCase().normalize("NFKD").replace(/[\u0300-\u036f]/g, ""))){
                    document.getElementById(stage.id).classList.add("highlighted")
                    return true
                }
            })

        }
    }


    document.querySelector('#searchTxt').addEventListener("keyup", ()=>searchURL());
</script>
</body>
</html>
