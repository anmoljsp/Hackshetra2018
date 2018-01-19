# Hackshetra2018


We have tried to make a web solution that helps teachers organize and evaluate each of their class students' performances while giving the students capabilities to interact with both their teachers and colleagues on the various assignment topics both locally and over the Internet. The students can share their assignments locally with their teacher when inter connected on the same local server through LAN ports using FTP transfer over DNSmasq. The students can edit their codes online using our text editor to both write or edit their assignments. The teachers in turn can use the editor to highlight the errors to the students. We have used NicEditor API for the same. Teachers can evaluate and grade the assignments sorted class-wise. Both students and teachers recieve real-time notification over their registered mobile phones through our service. It has been implemented over Bootstrap Notify, a Pusher HTTP API based API. Once the machine is connected to the internet, all the new files uploaded are checked for plagiarism and classified as Acceptable and Rejected. However, only the students are notified on such assignment submissions and not the teacher. Our CopyLeaks Plagiarism Detector API checks for the uploaded files across the internet and shows the percentage content copied from URL's over the net.




Instructions to run:

index.php is the starting login page wher both teachers and students can login on the same portal. Teachers can create an assignment via niceditor API on createAssignment.php. Students can submit their solution on createSolution.php and also check for plagiarism on /PHP-Plagiarism-Checker-master/example_synchronous.php.
