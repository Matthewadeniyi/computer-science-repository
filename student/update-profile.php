<?php
    session_start();
    if (!isset($_SESSION['matricno'])) {
      header("Location: login.php"); // Redirect to login page if not logged in
      exit();
      }
  include_once('inc/config.php');
?>
<html>
    <?php include_once('inc/head.php');?>
  <body>
    <?php include_once('inc/header.php');?>
    <div class="relative flex size-full min-h-screen flex-col bg-[#FFFFFF] group/design-root overflow-xy-hidden" style='font-family: "Plus Jakarta Sans", "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">
        
        <div class="gap-1 px-6 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1 justify-center">
          <div class="flex gap-3">
                  <div
                    class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
                    style='background-image: url("assets/images/users/patient.png");'
                  ></div>
                  <div class="flex flex-col">
                    <h1 class="text-[#1C160C] text-base font-medium leading-normal"><?=$_SESSION['fullname']?>'s Profile</h1>
                    <p class="text-[#A18249] text-sm font-normal leading-normal"></p>
                  </div>
                </div>

            <div class="pb-3">
              <div class="flex border-b border-[#E9DFCE] px-4 justify-between">
                <a class="flex flex-col items-center justify-center border-b-[3px] border-b-[#019863] text-[#1C160C] pb-[13px] pt-4 flex-1" href="#">
                  <p class="text-[#1C160C] text-sm font-bold leading-normal tracking-[0.015em]">Update Profile</p>
                </a>
                
              </div>
            </div>
            <?php
              $sql = $db->query("SELECT * FROM students WHERE matricno ='{$_SESSION['matricno']}' ");
              $row = mysqli_fetch_assoc($sql);
             
            ?>
            <form method="post">
              <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                <label class="flex flex-col min-w-40 flex-1">
                  <p class="text-[#1C160C] text-base font-medium leading-normal pb-2">Full Name</p>
                  <input
                    name="full_name"
                    placeholder="full name" 
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#1C160C] focus:outline-0 focus:ring-0 border border-[#E9DFCE] bg-[#FFFFFF] focus:border-[#E9DFCE] h-14 placeholder:text-[#A18249] p-[15px] text-base font-normal leading-normal"
                    
                  />
                </label>                
              </div>
              <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                <label class="flex flex-col min-w-40 flex-1">
                  <p class="text-[#1C160C] text-base font-medium leading-normal pb-2">Email Address</p>
                  <input
                    name="email"
                    placeholder="email address"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#1C160C] focus:outline-0 focus:ring-0 border border-[#E9DFCE] bg-[#FFFFFF] focus:border-[#E9DFCE] h-14 placeholder:text-[#A18249] p-[15px] text-base font-normal leading-normal"
                    value="<?=$row['email']?>"
                  />
                </label>
              </div>
              <div class="flex px-4 py-3 justify-left">
                  <button
                    name="updatestudentprofile"
                    type="submit"
                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-5 flex-1 bg-[#019863] text-[#FFFFFF] text-base font-bold leading-normal tracking-[0.015em]"
                  >
                    <span class="truncate">Update</span>
                  </button>
                </div>
            </form>
           
              <div class="pb-3">
              <div class="flex border-b border-[#E9DFCE] px-4 justify-between">
                <a class="flex flex-col items-center justify-center border-b-[3px] border-b-[#019863] text-[#1C160C] pb-[13px] pt-4 flex-1" href="#">
                  <p class="text-[#1C160C] text-sm font-bold leading-normal tracking-[0.015em]">Reset Password</p>
                </a>
                
              </div>
            </div>
            <form method="post">

              <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                
                <label class="flex flex-col min-w-40 flex-1">
                  <p class="text-[#1C160C] text-base font-medium leading-normal pb-2">New Password</p>
                  <input
                    name="new_password"
                    placeholder="Enter new password"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#1C160C] focus:outline-0 focus:ring-0 border border-[#E9DFCE] bg-[#FFFFFF] focus:border-[#E9DFCE] h-14 placeholder:text-[#A18249] p-[15px] text-base font-normal leading-normal"
                    value=""
                  />
                </label>
              </div>
              <div class="flex max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                <label class="flex flex-col min-w-40 flex-1">
                  <p class="text-[#1C160C] text-base font-medium leading-normal pb-2">Confirm New Password</p>
                  <input
                    name="c_newPassword"
                    placeholder="Confirm new password"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#1C160C] focus:outline-0 focus:ring-0 border border-[#E9DFCE] bg-[#FFFFFF] focus:border-[#E9DFCE] h-14 placeholder:text-[#A18249] p-[15px] text-base font-normal leading-normal"
                    value=""
                  />
                </label>
              </div>
              <div class="flex px-4 py-3 justify-left">
                <button
                  name="updatePassword"
                  type="submit"
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-5 flex-1 bg-[#019863] text-[#FFFFFF] text-base font-bold leading-normal tracking-[0.015em]"
                >
                  <span class="truncate">Save</span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include_once('inc/footer.php'); ?>
  </body>
</html>
