<?php
    session_start();
    if (!isset($_SESSION['matricno'])) {
      header("Location: login.php"); // Redirect to login page if not logged in
      exit();
      }
    include_once('inc/config.php');
    $projectid = $_GET['projectid'];
    $sql = $db->query("SELECT * FROM projects WHERE MD5(sn)='$projectid' ");
    if(mysqli_num_rows($sql)==0){
        header("Location:student-dashboard.php");
        exit();
    }else{
        $rows=mysqli_fetch_assoc($sql);
    }

?>
<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900&amp;family=Plus+Jakarta+Sans%3Awght%40400%3B500%3B700%3B800"
    />

    <title>Galileo Design</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  </head>
  <body>
    <div class="relative flex size-full min-h-screen flex-col bg-[#f0f5fa] group/design-root overflow-xy-hidden" style='font-family: "Plus Jakarta Sans", "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">
        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#dde8f3] px-10 py-3">
          <div class="flex items-center gap-8">
            <div class="flex items-center gap-4 text-[#0b141e]">
              <div class="size-4">
                <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M12.0799 24L4 19.2479L9.95537 8.75216L18.04 13.4961L18.0446 4H29.9554L29.96 13.4961L38.0446 8.75216L44 19.2479L35.92 24L44 28.7521L38.0446 39.2479L29.96 34.5039L29.9554 44H18.0446L18.04 34.5039L9.95537 39.2479L4 28.7521L12.0799 24Z"
                    fill="currentColor"
                  ></path>
                </svg>
              </div>
              <h2 class="text-[#0b141e] text-lg font-bold leading-tight tracking-[-0.015em]">Computer Science Repository</h2>
            </div>
            <div class="flex items-center gap-9">
              <a class="text-[#0b141e] text-sm font-medium leading-normal" href="#">About</a>
              <a class="text-[#0b141e] text-sm font-medium leading-normal" href="#">Contact</a>
              <a class="text-[#0b141e] text-sm font-medium leading-normal" href="#">Support</a>
            </div>
          </div>
          <div class="flex flex-1 justify-end gap-8">
            <label class="flex flex-col min-w-40 !h-10 max-w-64">
              <div class="flex w-full flex-1 items-stretch rounded-xl h-full">
                <div
                  class="text-[#3b6ea5] flex border-none bg-[#dde8f3] items-center justify-center pl-4 rounded-l-xl border-r-0"
                  data-icon="MagnifyingGlass"
                  data-size="24px"
                  data-weight="regular"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"
                    ></path>
                  </svg>
                </div>
                <input
                  placeholder="Search"
                  class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#0b141e] focus:outline-0 focus:ring-0 border-none bg-[#dde8f3] focus:border-none h-full placeholder:text-[#3b6ea5] px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal"
                  value=""
                />
              </div>
            </label>
            <button
              class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#1972d2] text-[#f0f5fa] text-sm font-bold leading-normal tracking-[0.015em]"
            >
              <span class="truncate">New project</span>
            </button>
            <div
              class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
              style='background-image: url("https://cdn.usegalileo.ai/sdxl10/4e01af82-90c7-47c1-b0d6-47a781e344be.png");'
            ></div>
          </div>
        </header>
        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="grid grid-cols-[repeat(auto-fit,minmax(250px,1fr))] gap-3 p-4">
              <div class="flex min-w-72 flex-col gap-3">
                <h2 class="text-[#0b141e] text-base font-bold leading-tight"><?=$rows['project_title']?></h2>
                  <p class="text-[#3b6ea5] text-sm font-normal leading-normal">Submitted by: <?=$rows['student_name']?></p>
                  <p class="text-[#3b6ea5] text-sm font-normal leading-normal">Year: <?=$rows['year_of_submission']?></p>
                  <?php
                   $supervisorName = $stud->sqLx('supervisors','sn',$rows['supervisor'],'supervisor_name');
                   $supervisorDepartmentId = $stud->sqLx('supervisors','sn',$rows['supervisor'],'supervisor_department');
                   $departmentName = $stud->sqLx('departments', 'sn', $supervisorDepartmentId, 'department_name');
                   ?>
                  <p class='text-[#3b6ea5] text-sm font-normal leading-normal'> Supervised by:<?=$supervisorName?> (<?=$departmentName?>) </p>
              </div>
            </div>
            <p class="text-[#0b141e] text-base font-normal leading-normal pb-3 pt-1 px-4">
              <?=$rows['project_body']?>
            </p>
            <div class="flex px-4 py-3 justify-start">
              <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-5 bg-[#1972d2] text-[#f0f5fa] gap-2 pl-5 text-base font-bold leading-normal tracking-[0.015em]"
              >
                <div class="text-[#f0f5fa]" data-icon="Download" data-size="24px" data-weight="regular">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M240,136v64a16,16,0,0,1-16,16H32a16,16,0,0,1-16-16V136a16,16,0,0,1,16-16H72a8,8,0,0,1,0,16H32v64H224V136H184a8,8,0,0,1,0-16h40A16,16,0,0,1,240,136Zm-117.66-2.34a8,8,0,0,0,11.32,0l48-48a8,8,0,0,0-11.32-11.32L136,108.69V24a8,8,0,0,0-16,0v84.69L85.66,74.34A8,8,0,0,0,74.34,85.66ZM200,168a12,12,0,1,0-12,12A12,12,0,0,0,200,168Z"
                    ></path>
                  </svg>
                </div>
                <!-- <span class="truncate">Download Document</span> -->
                
                 <!-- <a href="<?=$rows['project_file'] ?>" download>Download Full Project</a> -->
                  <!-- <a href="./admin/uploads/<?=$rows['project_file'] ?>" download>Download Full Project</a> -->
                  <a href="../uploads/<?=$rows['project_file'] ?>" download>Download Full Project</a>
                  <!-- admin\uploads
                  C:\xampp\htdocs\computer-repository\admin\uploads -->

              </button>
            </div>
          </div>
        </div>
        <footer class="flex justify-center">
          <div class="flex max-w-[960px] flex-1 flex-col">
            <footer class="flex flex-col gap-6 px-5 py-10 text-center @container">
              <div class="flex flex-wrap items-center justify-center gap-6 @[480px]:flex-row @[480px]:justify-around">
                <a class="text-[#3b6ea5] text-base font-normal leading-normal min-w-40" href="#">Privacy Policy</a>
                <a class="text-[#3b6ea5] text-base font-normal leading-normal min-w-40" href="#">Terms of Service</a>
              </div>
              <div class="flex flex-wrap justify-center gap-4">
                <a href="#">
                  <div class="text-[#3b6ea5]" data-icon="TwitterLogo" data-size="24px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M247.39,68.94A8,8,0,0,0,240,64H209.57A48.66,48.66,0,0,0,168.1,40a46.91,46.91,0,0,0-33.75,13.7A47.9,47.9,0,0,0,120,88v6.09C79.74,83.47,46.81,50.72,46.46,50.37a8,8,0,0,0-13.65,4.92c-4.31,47.79,9.57,79.77,22,98.18a110.93,110.93,0,0,0,21.88,24.2c-15.23,17.53-39.21,26.74-39.47,26.84a8,8,0,0,0-3.85,11.93c.75,1.12,3.75,5.05,11.08,8.72C53.51,229.7,65.48,232,80,232c70.67,0,129.72-54.42,135.75-124.44l29.91-29.9A8,8,0,0,0,247.39,68.94Zm-45,29.41a8,8,0,0,0-2.32,5.14C196,166.58,143.28,216,80,216c-10.56,0-18-1.4-23.22-3.08,11.51-6.25,27.56-17,37.88-32.48A8,8,0,0,0,92,169.08c-.47-.27-43.91-26.34-44-96,16,13,45.25,33.17,78.67,38.79A8,8,0,0,0,136,104V88a32,32,0,0,1,9.6-22.92A30.94,30.94,0,0,1,167.9,56c12.66.16,24.49,7.88,29.44,19.21A8,8,0,0,0,204.67,80h16Z"
                      ></path>
                    </svg>
                  </div>
                </a>
                <a href="#">
                  <div class="text-[#3b6ea5]" data-icon="FacebookLogo" data-size="24px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm8,191.63V152h24a8,8,0,0,0,0-16H136V112a16,16,0,0,1,16-16h16a8,8,0,0,0,0-16H152a32,32,0,0,0-32,32v24H96a8,8,0,0,0,0,16h24v63.63a88,88,0,1,1,16,0Z"
                      ></path>
                    </svg>
                  </div>
                </a>
                <a href="#">
                  <div class="text-[#3b6ea5]" data-icon="LinkedinLogo" data-size="24px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M216,24H40A16,16,0,0,0,24,40V216a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V40A16,16,0,0,0,216,24Zm0,192H40V40H216V216ZM96,112v64a8,8,0,0,1-16,0V112a8,8,0,0,1,16,0Zm88,28v36a8,8,0,0,1-16,0V140a20,20,0,0,0-40,0v36a8,8,0,0,1-16,0V112a8,8,0,0,1,15.79-1.78A36,36,0,0,1,184,140ZM100,84A12,12,0,1,1,88,72,12,12,0,0,1,100,84Z"
                      ></path>
                    </svg>
                  </div>
                </a>
              </div>
              <p class="text-[#3b6ea5] text-base font-normal leading-normal">Copyright 2023 Academic Repository</p>
            </footer>
          </div>
        </footer>
      </div>
    </div>
  </body>
</html>
