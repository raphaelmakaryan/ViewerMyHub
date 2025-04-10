<?php
require_once "./utils/userInfos.php";
require_once "./utils/issuesInfos.php";
require_once "./utils/timeFunction.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViewerMyHub</title>
    <link rel="shortcut icon" href="./imgs/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
</head>

<body>
    <header id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <button id="theme-toggle" class="theme-toggle" aria-label="Theme toggle">
                        <i class="bi bi-sun-fill light-icon"></i>
                        <i class="bi bi-moon-fill dark-icon"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <section id="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-12 col-lg-4 mb-5">
                    <div class="container-fluid">
                        <?php if (!empty($userInfo)): ?>
                            <div class="row profil">
                                <div class="col-12 d-flex justify-content-center align-items-center mt-4 mt-2">
                                    <a target="_blank" href="<?php echo $userInfo['html_url']; ?>">
                                        <img src="<?php echo $userInfo['avatar_url']; ?>" alt="Avatar" class="rounded-circle" width="100">
                                    </a>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center mt-2">
                                    <a target="_blank" href="<?php echo $userInfo['html_url']; ?>">
                                        <p class="fs-2 text-center"><?php echo $userInfo['name']; ?></p>
                                    </a>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center mt-1">
                                    <a target="_blank" href="<?php echo $userInfo['html_url']; ?>">
                                        <p class="fs-3 text-center"><?php echo $userInfo['login']; ?></p>
                                    </a>
                                </div>
                                <div class="col-12 d-flex justify-content-center align-items-center mb-1">
                                    <p class="fs-5 text-center fw-light">#<?php echo $userInfo['id']; ?></p>
                                </div>
                                <div class="col-12 d-flex flex-row align-items-center justify-content-around">
                                    <?php if (!empty($userInfo["company"])): ?>
                                        <p class="fs-5"><svg class="octicon octicon-organization svgColor" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true">
                                                <path d="M1.75 16A1.75 1.75 0 0 1 0 14.25V1.75C0 .784.784 0 1.75 0h8.5C11.216 0 12 .784 12 1.75v12.5c0 .085-.006.168-.018.25h2.268a.25.25 0 0 0 .25-.25V8.285a.25.25 0 0 0-.111-.208l-1.055-.703a.749.749 0 1 1 .832-1.248l1.055.703c.487.325.779.871.779 1.456v5.965A1.75 1.75 0 0 1 14.25 16h-3.5a.766.766 0 0 1-.197-.026c-.099.017-.2.026-.303.026h-3a.75.75 0 0 1-.75-.75V14h-1v1.25a.75.75 0 0 1-.75.75Zm-.25-1.75c0 .138.112.25.25.25H4v-1.25a.75.75 0 0 1 .75-.75h2.5a.75.75 0 0 1 .75.75v1.25h2.25a.25.25 0 0 0 .25-.25V1.75a.25.25 0 0 0-.25-.25h-8.5a.25.25 0 0 0-.25.25ZM3.75 6h.5a.75.75 0 0 1 0 1.5h-.5a.75.75 0 0 1 0-1.5ZM3 3.75A.75.75 0 0 1 3.75 3h.5a.75.75 0 0 1 0 1.5h-.5A.75.75 0 0 1 3 3.75Zm4 3A.75.75 0 0 1 7.75 6h.5a.75.75 0 0 1 0 1.5h-.5A.75.75 0 0 1 7 6.75ZM7.75 3h.5a.75.75 0 0 1 0 1.5h-.5a.75.75 0 0 1 0-1.5ZM3 9.75A.75.75 0 0 1 3.75 9h.5a.75.75 0 0 1 0 1.5h-.5A.75.75 0 0 1 3 9.75ZM7.75 9h.5a.75.75 0 0 1 0 1.5h-.5a.75.75 0 0 1 0-1.5Z"></path>
                                            </svg> <?php echo $userInfo['company']; ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($userInfo["blog"])): ?>
                                        <p class="fs-5"><svg title="Social account" aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-link svgColor">
                                                <path d="m7.775 3.275 1.25-1.25a3.5 3.5 0 1 1 4.95 4.95l-2.5 2.5a3.5 3.5 0 0 1-4.95 0 .751.751 0 0 1 .018-1.042.751.751 0 0 1 1.042-.018 1.998 1.998 0 0 0 2.83 0l2.5-2.5a2.002 2.002 0 0 0-2.83-2.83l-1.25 1.25a.751.751 0 0 1-1.042-.018.751.751 0 0 1-.018-1.042Zm-4.69 9.64a1.998 1.998 0 0 0 2.83 0l1.25-1.25a.751.751 0 0 1 1.042.018.751.751 0 0 1 .018 1.042l-1.25 1.25a3.5 3.5 0 1 1-4.95-4.95l2.5-2.5a3.5 3.5 0 0 1 4.95 0 .751.751 0 0 1-.018 1.042.751.751 0 0 1-1.042.018 1.998 1.998 0 0 0-2.83 0l-2.5 2.5a1.998 1.998 0 0 0 0 2.83Z"></path>
                                            </svg> <?php echo $userInfo['blog']; ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($userInfo["location"])): ?>
                                        <p class="fs-5"><svg class="octicon octicon-location svgColor" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true">
                                                <path d="m12.596 11.596-3.535 3.536a1.5 1.5 0 0 1-2.122 0l-3.535-3.536a6.5 6.5 0 1 1 9.192-9.193 6.5 6.5 0 0 1 0 9.193Zm-1.06-8.132v-.001a5 5 0 1 0-7.072 7.072L8 14.07l3.536-3.534a5 5 0 0 0 0-7.072ZM8 9a2 2 0 1 1-.001-3.999A2 2 0 0 1 8 9Z"></path>
                                            </svg> <?php echo $userInfo['location']; ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($userInfo["email"])): ?>
                                        <p class="fs-5"><svg class="octicon octicon-mail svgColor" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true">
                                                <path d="M1.75 2h12.5c.966 0 1.75.784 1.75 1.75v8.5A1.75 1.75 0 0 1 14.25 14H1.75A1.75 1.75 0 0 1 0 12.25v-8.5C0 2.784.784 2 1.75 2ZM1.5 12.251c0 .138.112.25.25.25h12.5a.25.25 0 0 0 .25-.25V5.809L8.38 9.397a.75.75 0 0 1-.76 0L1.5 5.809v6.442Zm13-8.181v-.32a.25.25 0 0 0-.25-.25H1.75a.25.25 0 0 0-.25.25v.32L8 7.88Z"></path>
                                            </svg> <?php echo $userInfo['email']; ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($userInfo["hireable"])): ?>
                                        <p class="fs-5"><?php echo $userInfo['hireable']; ?></p>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($userInfo["bio"])): ?>
                                    <div class="col-12 d-flex justify-content-center align-items-center">
                                        <p class="fs-5 text-center"><?php echo $userInfo['bio']; ?></p>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($userInfo["twitter_username"])): ?>
                                    <div class="col-12 d-flex justify-content-center align-items-center">
                                        <p class="fs-5 text-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16" width="16" height="16" role="img" aria-labelledby="akd9vfp7zo9avgywa50oovztlga66o59" class="octicon">
                                                <title id="akd9vfp7zo9avgywa50oovztlga66o59">X</title>
                                                <path fill="currentColor" d="M9.332 6.925 14.544 1h-1.235L8.783 6.145 5.17 1H1l5.466 7.78L1 14.993h1.235l4.78-5.433 3.816 5.433H15L9.332 6.925ZM7.64 8.848l-.554-.775L2.68 1.91h1.897l3.556 4.975.554.775 4.622 6.466h-1.897L7.64 8.848Z"></path>
                                            </svg> <?php echo $userInfo['twitter_username']; ?></p>
                                    </div>
                                <?php endif; ?>
                                <div class="col-12 d-flex flex-row align-items-center justify-content-around mt-1">
                                    <a target="_blank" href="<?php echo $userInfo['repos_url']; ?>">
                                        <p class="fs-4"><svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-repo UnderlineNav-octicon svgColor">
                                                <path d="M2 2.5A2.5 2.5 0 0 1 4.5 0h8.75a.75.75 0 0 1 .75.75v12.5a.75.75 0 0 1-.75.75h-2.5a.75.75 0 0 1 0-1.5h1.75v-2h-8a1 1 0 0 0-.714 1.7.75.75 0 1 1-1.072 1.05A2.495 2.495 0 0 1 2 11.5Zm10.5-1h-8a1 1 0 0 0-1 1v6.708A2.486 2.486 0 0 1 4.5 9h8ZM5 12.25a.25.25 0 0 1 .25-.25h3.5a.25.25 0 0 1 .25.25v3.25a.25.25 0 0 1-.4.2l-1.45-1.087a.249.249 0 0 0-.3 0L5.4 15.7a.25.25 0 0 1-.4-.2Z" color="white"></path>
                                            </svg> <?php echo $userInfo['public_repos']; ?></p>
                                    </a>
                                    <a target="_blank" href="<?php echo $userInfo['followers_url']; ?>">
                                        <p class="fs-4"><svg text="muted" aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-people svgColor">
                                                <path d="M2 5.5a3.5 3.5 0 1 1 5.898 2.549 5.508 5.508 0 0 1 3.034 4.084.75.75 0 1 1-1.482.235 4 4 0 0 0-7.9 0 .75.75 0 0 1-1.482-.236A5.507 5.507 0 0 1 3.102 8.05 3.493 3.493 0 0 1 2 5.5ZM11 4a3.001 3.001 0 0 1 2.22 5.018 5.01 5.01 0 0 1 2.56 3.012.749.749 0 0 1-.885.954.752.752 0 0 1-.549-.514 3.507 3.507 0 0 0-2.522-2.372.75.75 0 0 1-.574-.73v-.352a.75.75 0 0 1 .416-.672A1.5 1.5 0 0 0 11 5.5.75.75 0 0 1 11 4Zm-5.5-.5a2 2 0 1 0-.001 3.999A2 2 0 0 0 5.5 3.5Z"></path>
                                            </svg> <?php echo $userInfo['followers']; ?></p>
                                    </a>
                                    <a target="_blank" href="<?php echo $userInfo['following_url']; ?>">
                                        <p class="fs-4"><svg text="muted" aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-people svgColor">
                                                <path d="M2 5.5a3.5 3.5 0 1 1 5.898 2.549 5.508 5.508 0 0 1 3.034 4.084.75.75 0 1 1-1.482.235 4 4 0 0 0-7.9 0 .75.75 0 0 1-1.482-.236A5.507 5.507 0 0 1 3.102 8.05 3.493 3.493 0 0 1 2 5.5ZM11 4a3.001 3.001 0 0 1 2.22 5.018 5.01 5.01 0 0 1 2.56 3.012.749.749 0 0 1-.885.954.752.752 0 0 1-.549-.514 3.507 3.507 0 0 0-2.522-2.372.75.75 0 0 1-.574-.73v-.352a.75.75 0 0 1 .416-.672A1.5 1.5 0 0 0 11 5.5.75.75 0 0 1 11 4Zm-5.5-.5a2 2 0 1 0-.001 3.999A2 2 0 0 0 5.5 3.5Z"></path>
                                            </svg> <?php echo $userInfo['following']; ?></p>
                                    </a>
                                </div>
                                <div class="col-12 d-flex flex-row align-items-center justify-content-around mt-1">
                                    <p class="fs-6 fw-light m-0">created at <?php echo date("Y-m-d H:i:s", strtotime($userInfo['created_at'])); ?></p>
                                    <p class="fs-6 fw-light m-0">updated at <?php echo date("Y-m-d H:i:s", strtotime($userInfo['updated_at'])); ?></p>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($issues)): ?>
                            <div class="row issues">
                                <?php foreach ($issues as $issue): ?>
                                    <div class="col-12 d-flex flex-column align-items-start justify-content-start my-4">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-2 d-flex justify-content-center align-items-center">
                                                    <img src=" <?php $repoParts = explode('/', $issue['repository_url']);
                                                                echo "https://github.com/" . $repoParts[4] . ""; ?>.png" alt="" class="rounded-circle img-fluid" width="50">
                                                </div>
                                                <div class="col-10">
                                                    <div class="container-fluid">
                                                        <div class="row d-flex align-items-center">
                                                            <div class="col-10">
                                                                <a target="_blank" href="<?php echo $issue['html_url']; ?>">
                                                                    <?php
                                                                    if ($issue["state"] === "open") {
                                                                        $img = '<svg height="16" class="octicon octicon-git-pull-request open" viewBox="0 0 16 16" version="1.1" width="16" aria-hidden="true"><path d="M1.5 3.25a2.25 2.25 0 1 1 3 2.122v5.256a2.251 2.251 0 1 1-1.5 0V5.372A2.25 2.25 0 0 1 1.5 3.25Zm5.677-.177L9.573.677A.25.25 0 0 1 10 .854V2.5h1A2.5 2.5 0 0 1 13.5 5v5.628a2.251 2.251 0 1 1-1.5 0V5a1 1 0 0 0-1-1h-1v1.646a.25.25 0 0 1-.427.177L7.177 3.427a.25.25 0 0 1 0-.354ZM3.75 2.5a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5Zm0 9.5a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5Zm8.25.75a.75.75 0 1 0 1.5 0 .75.75 0 0 0-1.5 0Z"></path></svg>';
                                                                    } else if ($issue["state"] === "closed") {
                                                                        $img = '<svg height="16" class="octicon octicon-git-merge close" viewBox="0 0 16 16" version="1.1" width="16" aria-hidden="true"><path d="M5.45 5.154A4.25 4.25 0 0 0 9.25 7.5h1.378a2.251 2.251 0 1 1 0 1.5H9.25A5.734 5.734 0 0 1 5 7.123v3.505a2.25 2.25 0 1 1-1.5 0V5.372a2.25 2.25 0 1 1 1.95-.218ZM4.25 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm8.5-4.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM5 3.25a.75.75 0 1 0 0 .005V3.25Z"></path></svg>';
                                                                    }
                                                                    ?>
                                                                    <p class="fs-6 text-start text-truncate"><?php echo $img; ?><?php echo $issue['title']; ?></p>
                                                                </a>
                                                            </div>
                                                            <div class="col-2 ">
                                                                <a target="_blank" href="<?php echo $issue['url']; ?>">
                                                                    <p class="font12 text-end">#<?php echo $issue['number']; ?></p>
                                                                </a>
                                                            </div>
                                                            <div class="col-6  d-flex flex-row">
                                                                <p class="fs-6 text-start fst-italic text-truncate m-0">
                                                                    <?php
                                                                    $repoParts = explode('/', $issue['repository_url']);
                                                                    echo "<span class=''>" . $repoParts[4] . "</span>/" . $repoParts[5] . "";
                                                                    ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-6 d-flex flex-row-reverse">
                                                                <time class="font12 text-end"><?php echo timeFunction(strtotime($issue['updated_at'])); ?></time>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>
    </section>

    <footer id="footer" class="mt-5 mb-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <a href="https://github.com/raphaelmakaryan/ViewerMyHub" target="_blank">
                        <p class="text-center badge text-bg-primary fs-6 text-truncate"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8" />
                            </svg> Create my own page with ViewerMyHub!</p>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
</body>

</html>