<?php
  session_start();
  if (!isset($_SESSION['matricno'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
    }
      include_once('inc/config.php');


    

    
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

    <title>Computer Science Repository</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />
   

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  </head>
  <body>
    <div class="relative flex size-full min-h-screen flex-col bg-[#f0f5fa] group/design-root overflow-x-hidden" style='font-family: "Plus Jakarta Sans", "Noto Sans", sans-serif;'>
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
            <div class="flex items-center gap-9">
              <a class="text-[#0b141e] text-sm font-medium leading-normal" href="update-profile.php">Profile</a>
             
            </div>
            <div class="flex items-center gap-9">
              <a class="text-[#0b141e] text-sm font-medium leading-normal" href="student-logout.php">Logout</a>
             
            </div>
            <div
              class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
              style='background-image: url("https://cdn.usegalileo.ai/sdxl10/4e01af82-90c7-47c1-b0d6-47a781e344be.png");'
            ></div>
          </div>
        </header>
        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="flex flex-wrap justify-between gap-3 p-4">
              <div class="flex min-w-72 flex-col gap-3">
                <p class="text-[#0b141e] text-4xl font-black leading-tight tracking-[-0.033em]">Projects</p>
                <p class="text-[#3b6ea5] text-base font-normal leading-normal">Search projects...</p>
              </div>
            </div>
            <div class="px-4 py-3">
              <form action="" method="POST">

                <label class="flex flex-col min-w-40 h-12 w-full">
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
                        placeholder="Search projects..." name="searchterm"
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#0b141e] focus:outline-0 focus:ring-0 border-none bg-[#dde8f3] focus:border-none h-full placeholder:text-[#3b6ea5] px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal"
                        
                      /> <button type="submit" name="search_project"
                              class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#1972d2] text-white text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]"
                          >
                              <span class="truncate">Search</span>
                          </button>
                    
                  </div>
                </label>
              </form>
            </div>
            <div class="grid grid-cols-[repeat(auto-fit,minmax(250px,1fr))] gap-3 p-4">
            <?php
                $sql = $db->query("SELECT * FROM projects");
                if(!$sql){
                  echo "Error: " . $db->error;
                }elseif(mysqli_num_rows($sql)==0){
                    "<div class='flex flex-1 gap-3 rounded-lg border border-[#c7d8eb] bg-[#f0f5fa] p-4 flex-col cursor-pointer'>
                <div class='text-[#0b141e]' data-icon='BookOpen' data-size='24px' data-weight='regular'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='24px' height='24px' fill='currentColor' viewBox='0 0 256 256'>
                    <path
                      d='M224,48H160a40,40,0,0,0-32,16A40,40,0,0,0,96,48H32A16,16,0,0,0,16,64V192a16,16,0,0,0,16,16H96a24,24,0,0,1,24,24,8,8,0,0,0,16,0,24,24,0,0,1,24-24h64a16,16,0,0,0,16-16V64A16,16,0,0,0,224,48ZM96,192H32V64H96a24,24,0,0,1,24,24V200A39.81,39.81,0,0,0,96,192Zm128,0H160a39.81,39.81,0,0,0-24,8V88a24,24,0,0,1,24-24h64Z'
                    ></path>
                  </svg>
                </div>
                <div class='flex flex-col gap-1'>
                  <h2 class='text-[#0b141e] text-base font-bold leading-tight'>No projects Yet!</h2>
                  <p class='text-[#3b6ea5] text-sm font-normal leading-normal'>Please try again</p>
                </div>
              </div>";
              exit;
                }
                  $i=1;
                  while($rows=mysqli_fetch_assoc($sql)){?>
              <div class="flex flex-1 gap-3 rounded-lg border border-[#c7d8eb] bg-[#f0f5fa] p-4 flex-col">
                <div class="text-[#0b141e]" data-icon="BookOpen" data-size="24px" data-weight="regular">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                    <path
                      d="M224,48H160a40,40,0,0,0-32,16A40,40,0,0,0,96,48H32A16,16,0,0,0,16,64V192a16,16,0,0,0,16,16H96a24,24,0,0,1,24,24,8,8,0,0,0,16,0,24,24,0,0,1,24-24h64a16,16,0,0,0,16-16V64A16,16,0,0,0,224,48ZM96,192H32V64H96a24,24,0,0,1,24,24V200A39.81,39.81,0,0,0,96,192Zm128,0H160a39.81,39.81,0,0,0-24,8V88a24,24,0,0,1,24-24h64Z"
                    ></path>
                  </svg>
                </div>
                <div class="flex flex-col gap-1">
                  <h2 class="text-[#0b141e] text-base font-bold leading-tight"><?=$rows['project_title']?></h2>
                  <p class="text-[#3b6ea5] text-sm font-normal leading-normal">Submitted by: <?=$rows['student_name']?></p>
                  <?php
                   $supervisorName = $stud->sqLx('supervisors','sn',$rows['supervisor'],'supervisor_name');
                   $supervisorDepartmentId = $stud->sqLx('supervisors','sn',$rows['supervisor'],'supervisor_department');
                   $departmentName = $stud->sqLx('departments', 'sn', $supervisorDepartmentId, 'department_name');
                   ?>
                  <p class='text-[#3b6ea5] text-sm font-normal leading-normal'> Supervised by:<?=$supervisorName?> (<?=$departmentName?>) </p>
                  <a href="view-single-project.php?projectid=<?=mD5($rows['sn'])?>">Read More</a>

                  

                </div>
              </div>
              <?php $i++; } ?>
             
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include_once('inc/footer.php'); ?>
  </body>
</html>
