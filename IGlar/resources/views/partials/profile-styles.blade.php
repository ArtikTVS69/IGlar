<style>
    .share-photos-container {
        margin-top: 60px;
        margin-bottom: 30px;
        max-width: 935px;
    }

    /* Updated profile styling to match the screenshot */
    .info1 h2 {
        margin-right: 20px;
        font-weight: 400;
        font-size: 20px;
    }

    .info1 {
        align-items: center;
    }
    
    .info1 .upr {
        margin-left: 0;
        height: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 7px 16px;
        background-color: #262626;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
    }

    .info2 {
        margin-top: -20px !important;
        font-size: 16px;
        display: flex;
    }
    
    .info2 p {
        margin-right: 40px;
    }

    .info3 {
        margin-top: -10px !important;
        font-weight: 600;
    }

    .info4 {
        margin-top: -25px !important;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .profil img {
        object-fit: cover;
    }
    
    .profilpfp {
        margin-right: 80px;
    }

    .bottom-part-txt {
        margin-left: -50px;
    }
    
    .bottom-part {
        margin-top: 20px;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .prisp {
        border-top: 1px solid var(--white);
        padding-top: 15px;
        font-size: 12px;
        margin-right: 70px;
        letter-spacing: 1px;
    }

    .uloz {
        font-size: 12px;
        margin-right: 70px;
        letter-spacing: 1px;
        color: #a8a8a8;
    }

    .sozn {
        font-size: 12px;
        margin-right: 70px;
        letter-spacing: 1px;
        color: #a8a8a8;
    }
    
    .bottom-part-grey {
        margin-top: 40px;
    }
    
    .bottom-part-greytext li {
        list-style: none;
        font-size: 12px;
    }
    
    .bottom-part-greytext2 {
        font-size: 12px;
    }
    
    .M-container {
        padding-left: 250px;
        align-items: flex-start;
    }
    
    .upper-part-full {
        margin-top: 40px;
        width: 935px;
        max-width: 935px;
    }

    @media screen and (max-width: 1000px) {
        .M-container {
            padding-left: 80px;
        }
    }
    
    @media screen and (max-width: 735px) {
        .info2 {
            flex-direction: column;
            align-items: center;
        }
        
        .info2 p {
            margin-right: 0;
            margin-bottom: 5px;
        }
        
        .upper-part1 {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        
        .info {
            align-items: center;
        }
        
        .info1 {
            margin-left: 0;
            justify-content: center;
        }
        
        .info3, .info4 {
            margin-left: 0;
            justify-content: center;
        }
    }

    /* Post grid styles */
    .posts-container {
        width: 100%;
        max-width: 935px;
        margin: 0 auto;
        padding: 20px 0;
    }
    
    .posts-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
    }
    
    .post-item {
        position: relative;
        aspect-ratio: 1/1;
        overflow: hidden;
    }
    
    .post-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .post-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.3);
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s;
    }
    
    .post-item:hover .post-overlay {
        opacity: 1;
    }
    
    .post-stats {
        display: flex;
        gap: 20px;
        color: white;
        font-weight: bold;
    }
    
    .post-stats i {
        margin-right: 6px;
    }
    
    .no-posts-message {
        text-align: center;
        padding: 60px 0;
    }
    
    .no-posts-message h3 {
        font-size: 22px;
        margin-bottom: 10px;
        color: #ffffff;
    }
    
    .no-posts-message p {
        color: #a8a8a8;
        margin-bottom: 20px;
    }
    
    .add-post-btn {
        display: inline-block;
        padding: 8px 16px;
        background-color: #0095f6;
        color: white;
        font-weight: bold;
        text-decoration: none;
        border-radius: 4px;
    }
    
    @media (max-width: 735px) {
        .posts-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 3px;
        }
    }
    
    @media (max-width: 480px) {
        .posts-grid {
            grid-template-columns: 1fr;
        }
    }
    
    /* Follow/Unfollow buttons */
    .follow-btn, .unfollow-btn {
        padding: 5px 16px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
        border: none;
        margin-left: 20px;
    }
    
    .follow-btn {
        background-color: #0095f6;
        color: white;
    }
    
    .unfollow-btn {
        background-color: #262626;
        color: white;
    }
    
    .active {
        font-weight: bold;
        border-top: 1px solid #fff;
    }
    
    .error-message {
        text-align: center;
        padding: 100px 0;
    }
    
    .error-message h2 {
        margin-bottom: 20px;
        color: #ffffff;
    }
    
    .error-message a {
        color: #0095f6;
        text-decoration: none;
        font-weight: bold;
    }
</style>
