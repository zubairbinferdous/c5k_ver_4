<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Open Journal of Business Entrepreneurship and Marketing</title>
@include('layout.css')
<style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }
        .editorial-section {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .editor-info{
            text-align:center;
        }
        .editor-in-chief {
            font-size: 1.5rem;
            font-weight: bold;
            text-align:center;
        }
        .editorial-board {
            margin-top: 20px;
        }
        .editorial-board-member {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
@include('layout.header')
@include('layout.nav')



<div class="container my-5">
    <div class="journal-section">
        <h1 class="journal-title">Open Journal of Business Entrepreneurship and Marketing</h1>
        <div class="editor-info">
            <h4 class="editor-in-chief">Editor-in-Chief</h4>
            <p>Dr. Noor Md. Sadiqul Hasan,<br>The University of Adelaide, Australia & International University of Business Agriculture and Technology, Bangladesh</p>
        </div>

        <h4 class="board-title">Editorial Board Members</h4>
        <div class="list-group editorial-board">
            <div class="list-group-item board-member">Dr. Walid Mansour, Kafrelsheikh University, Egypt</div>
            <div class="list-group-item board-member">Dr. Norsuzailina Mohamad Sutan, University Malaysia Sarawak, Malaysia</div>
            <div class="list-group-item board-member">Dr. Md. Munir Hayet Khan, INTI International University (INTI-IU), Malaysia</div>
            <div class="list-group-item board-member">Dr. Md. Saiful Islam, University Malaysia Sarawak, Malaysia & Bangladesh Army University of Engineering and Technology, Bangladesh</div>
            <div class="list-group-item board-member">Dr. Md. Habibur Rahman Sobuz, The University of Adelaide, Australia & Khulna University of Engineering and Technology, Bangladesh</div>
            <div class="list-group-item board-member">Dr. Md. Alhaz Uddin, Jouf University, Kingdom of Saudi Arabia</div>
            <div class="list-group-item board-member">Rakibul Hasan, Westcliff University, USA</div>
            <div class="list-group-item board-member">Md. Jewel Rana, Washington State University, USA</div>
            <div class="list-group-item board-member">Md. Kawsarul Islam Kabbo, Khulna University of Engineering and Technology, Bangladesh</div>
            <div class="list-group-item board-member">Hasan Mahmud Sozib, North South University, Bangladesh</div>
        </div>
    </div>
</div>

@include('layout.footer_nav')
@include('layout.footer')
@include('layout.js')

</body>

</html>