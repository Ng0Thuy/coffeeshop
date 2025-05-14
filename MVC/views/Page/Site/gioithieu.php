<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
    }

    .about .about-us {
        position: relative;
        width: 100%;
        min-height: 100vh;
        background-image: url('../MVC/public/images/anh-cafe-22.jpg');
        background-size: cover;
        background-position: center;
    }

    .about-us .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 20px;
        z-index: 0;
    }

    .about-us h3 {
        font-size: 36px;
        font-weight: bold;
        margin-bottom: 20px;
        font-family: 'Pacifico', cursive;
    }

    .about-us h6 {
        font-size: 18px;
        max-width: 800px;
        line-height: 1.6;
        color: burlywood;
    }

    .service h4 {
        font-weight: bold;
        font-size: 40px;
        color: brown;
        margin-top: 15%;
        text-align: center;
    }

    .about-details {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 50px 0;
        padding: 0 20px;
    }

    .description,
    .vision {
        width: 30%;
    }

    .description h5,
    .vision h5 {
        font-size: 37px;
        font-weight: bold;
        margin-bottom: 10px;
        color: brown;
    }

    .description p,
    .vision p {
        font-size: 16px;
        color: black;
        font-weight: 200;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .container {
        display: flex;
        margin-top: 10px;
    }

    .image-center {
        text-align: center;
        width: 30%;
        position: relative;
    }

    .image-center img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        animation: zoomInOut 6s ease-in-out infinite;
        transform-origin: center center;
        display: block;
        margin: 0 auto;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    @keyframes zoomInOut {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.08);
        }

        100% {
            transform: scale(1);
        }
    }

    /* Section Title */
    .section-title {
        width: 100%;
        text-align: center;
        margin-bottom: 30px;
    }

    .section-title h2 {
        color: var(--sub-color);
        font-size: 32px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }

    .section-title h2::before {
        content: attr(data-title);
        display: block;
        font-size: 30px;
        color: var(--sub-color);
        font-weight: 400;
    }

    /* About Section */
    .about {
        background-color: var(--main-color);
    }

    .about-item {
        width: 50%;
        padding: 20px;
    }

    .about .about-item img {
        width: 100%;
        border-radius: 10px;
    }

    .about-item h2 {
        color: #000;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .about-item p {
        line-height: 1.6;
        color: var(--sub-color);
        font-size: 16px;
        margin-bottom: 20px;
        font-family: "Roboto", sans-serif;
    }

    .about-item-img {
        position: relative;
    }

    .about-item-img span {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        font-weight: 700;
        font-size: 28px;
        white-space: nowrap;
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
        z-index: 2;
    }

    .about-item-img::before {
        content: "";
        display: block;
        width: 80px;
        height: 80px;
        border: 2px solid rgba(255, 255, 255, 0.6);
        border-radius: 12px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        animation: xoayVong 6s linear infinite;
        box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
    }
</style>


<div class="about">


<section class="about-us">
    <div class="overlay">
        <h3>Welcome to Mee Coffee</h3>
        <h6>Chúng tôi tin rằng mỗi tách cà phê là một câu chuyện về hương vị, con người và những khoảnh khắc bình dị giữa nhịp sống hối hả. Mỗi hạt cà phê mang trong mình dấu ấn của đất, trời và bàn tay người vun trồng. Từ cao nguyên đầy nắng gió, đến những giọt mồ hôi của người nông dân cần mẫn, tất cả hội tụ để tạo nên một hương vị đậm đà, chân thật và khó quên. Và chính hương vị ấy là cầu nối giữa con người với con người – dù ở bất kỳ nơi đâu, cà phê vẫn luôn mở đầu cho những kết nối chân thành. Chúng tôi không chỉ phục vụ cà phê, mà còn muốn mang đến một trải nghiệm – nơi bạn có thể chậm lại, cảm nhận và tìm thấy niềm vui trong những điều nhỏ bé. Dù bạn là người yêu thích vị đắng nguyên bản hay mê say sự ngọt ngào nhẹ nhàng, mỗi tách cà phê đều là một lời mời gọi bạn sống chậm hơn một nhịp, để lắng nghe chính mình.</h6>
    </div>
</section>

<div class="service">
    <h4>SINCE 2025</h4>
</div>

<section class="about-details">
    <div class="container">
        <div class="description">
            <h5>Thực đơn và Dịch vụ</h5>
            <p>Thực đơn đồ uống phong phú, từ cà phê nguyên chất đến các loại trà, sinh tố và bánh ngọt.</p>
            <p>Dịch vụ đặt hàng trực tuyến, giao hàng tận nơi nhanh chóng.</p>
            <p>Không gian quán phù hợp để làm việc, gặp gỡ bạn bè hoặc tổ chức sự kiện nhỏ.</p>
        </div>
        <div class="image-center">
            <img src="https://demo.htmlcodex.com/1528/coffee-shop-html-template/img/about.png" alt="Ly Latte với Latte Art">
        </div>
        <div class="vision">
            <h5>Tầm nhìn và Sứ mệnh</h5>
            <p>Chúng tôi không chỉ phục vụ đồ uống mà còn lan tỏa giá trị của sự gắn kết, niềm vui và cảm giác thân thuộc. Coffee Shop hướng tới trở thành điểm đến lý tưởng để bạn tận hưởng những khoảnh khắc đáng nhớ bên bạn bè và gia đình.</p>
        </div>
    </div>
</section>
</div>