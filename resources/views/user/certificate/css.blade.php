<style>
    .certificate {
        max-width: 1113px;
        border: 2px solid rgb(184, 182, 182);
        text-align: center;
        position: relative;
    }
    .certificate .bg_image {
        content: ' ';
        position: absolute;
        height: 600px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
        opacity: 0.2;
    }

    .certificate_2 {
        border: 2px solid rgb(184, 182, 182);
        margin: 10px;
    }

    .certificate_2 .img {
        display: flex;
        justify-content: space-between;
    }
    .certificate .img img{
        height: 80px;
        margin: 10px 0;
    }
    .certificate .title {
        font-size: 45px;
    }
    .certificate .presented_to {
        font-size: 30px;
        margin-bottom: 0 !important;
    }
    .certificate .student {
        font-size: 40px;
    }
    .certificate .course {
        font-size: 20px;
    }
    .signature {
        display: flex;
        padding: 0 50px;
        justify-content: space-between;
    }

    .signature p {
        margin: 0;
    }

    /* .certificate .signature {
        border-top: 1px solid black;
        font-size: 25px;
        display: inline-block;
        line-height: 0.82;
        margin-top: 40px;
    }
    .certificate .signature_deg {
        font-size: 25px;
    } */

</style>
