<style>
    body {
        font-family: 'bangla', sans-serif;
    }

    .certificate {
        max-width: 1113px;
        border: 2px solid rgb(184, 182, 182);
        text-align: center;
        position: relative;
        color: black;
    }

    .certificate .bg_image {
        content: ' ';
        position: absolute;
        height: 590px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
        opacity: 0.2;
    }

    .certificate_2 {
        border: 2px solid rgb(184, 182, 182);
        margin: 10px;
        height: 640px;
    }

    .certificate_2 .img {
        display: inline-block;
        justify-content: center;
    }

    .certificate .img img {
        height: 90px;
        margin: 10px 0 3px 158px;
    }

    .serial_no {
        width: 160px;
        float: right;
        border: 2px solid black;
        padding: 6px 9px;
        margin: 10px
    }

    .certificate .title {
        font-size: 45px;
    }

    .certificate .presented_to {
        font-size: 30px;
        margin: 0 !important;
        font-weight: bold;
    }

    .presented_to_cert {
        color: rgb(221, 14, 240);
        text-decoration: underline;
    }

    table {
        width: 80%;
        font-size: 20px;
    }

    table .tr {
        text-align: right;
        padding-right: 8px
    }

    table .tl {
        text-align: left;
    }

    .certificate .student {
        font-size: 20px;
        margin: 0;
        padding: 0;
        line-height: 30px;
        font-weight: bold;
    }

    .certificate .course {
        font-size: 20px;
        border-top: 2px solid black;
        margin-top: 5px;
    }

    .signature {
        display: flex;
        padding: 0 60px;
        margin-bottom: 10px;
        justify-content: space-between;
    }

    .signature p {
        margin: 0;
    }
</style>
