<?php include ('head.php');?>
<body>
    <div class="container">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <center><?php echo $poste['name'] ?></center>
                </div>
                <div class="panel-body">
                    <div class="rowCard">
                        <div class="columnCard">
                            <div class="card">
                                <img src="admin/<?php echo $fetch['img'] ?>">
                                <div class="containerCard">
                                    <h2 class="nameCard"><?php echo $fetch['firstname'] . " " . $fetch['lastname'] ?></h2>
                                    <p class="levelCard"><?php echo $fetch['year_level'] ?></p>
                                    <div class="voteCheck fancyCheckbox" onclick="voteClicked(this)">
                                        <span class="vote_text">Je vote </span><input onclick="(function(e) {e.stopPropagation();})(event)" type="checkbox" value="<?php echo $fetch['candidate_id']; ?>" name="<?php echo $poste['class_name'] . "_id"; ?>" class="<?php echo $poste['class_name']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>