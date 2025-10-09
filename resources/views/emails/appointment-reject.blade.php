<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Request Update</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            background-color: #e74c3c;
            color: #ffffff;
            padding: 40px 20px;
            text-align: center;
        }
        
        .header-icon {
            width: 70px;
            height: 70px;
            background-color: #ffffff;
            border-radius: 50%;
            margin: 0 auto 15px;
            font-size: 40px;
            color: #e74c3c;
            padding: 7px;
        }
        
        .header h1 {
            font-size: 26px;
            margin-bottom: 8px;
        }
        
        .header p {
            font-size: 15px;
            opacity: 0.95;
        }
        
        .content {
            padding: 35px 30px;
            border: 1px solid #e0e0e0;
        }
        
        .greeting {
            font-size: 16px;
            margin-bottom: 20px;
            color: #333333;
        }
        
        .status-message {
            background-color: #f8d7da;
            border-left: 4px solid #e74c3c;
            padding: 20px;
            margin: 25px 0;
            border-radius: 5px;
        }
        
        .status-message h2 {
            color: #721c24;
            font-size: 18px;
            margin-bottom: 10px;
        }
        
        .status-message p {
            color: #721c24;
            line-height: 1.6;
            font-size: 15px;
        }
        
        .request-details {
            background-color: #f8f9fa;
            border: 1px solid #e0e0e0;
            padding: 20px;
            margin: 25px 0;
            border-radius: 5px;
        }
        
        .request-details h3 {
            color: #2c3e50;
            font-size: 16px;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e74c3c;
        }
        
        .detail-row {
            display: flex;
            margin-bottom: 12px;
            font-size: 15px;
        }
        
        .detail-row:last-child {
            margin-bottom: 0;
        }
        
        .detail-label {
            font-weight: bold;
            color: #2c3e50;
            width: 160px;
            flex-shrink: 0;
        }
        
        .detail-value {
            color: #555555;
        }
        
        .reason-box {
            background-color: #fff3cd;
            border: 1px solid #ffc107;
            padding: 20px;
            margin: 25px 0;
            border-radius: 5px;
        }
        
        .reason-box h3 {
            color: #856404;
            font-size: 16px;
            margin-bottom: 12px;
        }
        
        .reason-box p {
            color: #856404;
            line-height: 1.6;
            font-size: 14px;
            margin-bottom: 10px;
        }
        
        .reason-box p:last-child {
            margin-bottom: 0;
        }
        
        .reason-list {
            margin: 15px 0 0 20px;
            color: #856404;
        }
        
        .reason-list li {
            margin-bottom: 8px;
            line-height: 1.5;
        }
        
        .alternative-box {
            background-color: #d1ecf1;
            border-left: 4px solid #17a2b8;
            padding: 20px;
            margin: 25px 0;
            border-radius: 5px;
        }
        
        .alternative-box h3 {
            color: #0c5460;
            font-size: 16px;
            margin-bottom: 12px;
        }
        
        .alternative-box p {
            color: #0c5460;
            line-height: 1.6;
            font-size: 14px;
            margin-bottom: 10px;
        }
        
        .alternative-box p:last-child {
            margin-bottom: 0;
        }
        
        .options-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin: 20px 0;
        }
        
        .option-card {
            background-color: #ffffff;
            border: 2px solid #e0e0e0;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            transition: all 0.3s;
        }
        
        .option-card:hover {
            border-color: #3498db;
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.2);
        }
        
        .option-icon {
            font-size: 32px;
            margin-bottom: 10px;
        }
        
        .option-title {
            font-weight: bold;
            color: #2c3e50;
            font-size: 15px;
            margin-bottom: 8px;
        }
        
        .option-description {
            font-size: 13px;
            color: #777777;
            line-height: 1.4;
        }
        
        .action-buttons {
            text-align: center;
            margin: 30px 0;
        }
        
        .button {
            display: inline-block;
            padding: 14px 32px;
            margin: 8px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 15px;
            transition: all 0.3s;
        }
        
        .button-primary {
            background-color: #3498db;
            color: #ffffff;
        }
        
        .button-primary:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.4);
        }
        
        .button-secondary {
            background-color: #ffffff;
            color: #555555;
            border: 2px solid #e0e0e0;
        }
        
        .button-secondary:hover {
            border-color: #3498db;
            color: #3498db;
        }
        
        .contact-box {
            background-color: #e7f3ff;
            border: 1px solid #b3d7ff;
            padding: 20px;
            margin: 25px 0;
            border-radius: 5px;
            text-align: center;
        }
        
        .contact-box h3 {
            color: #0056b3;
            font-size: 16px;
            margin-bottom: 15px;
        }
        
        .contact-info {
            color: #004085;
            font-size: 15px;
            line-height: 1.8;
        }
        
        .contact-info strong {
            color: #0056b3;
        }
        
        .divider {
            height: 1px;
            background-color: #e0e0e0;
            margin: 25px 0;
        }
        
        .apology-text {
            background-color: #f8f9fa;
            padding: 20px;
            margin: 25px 0;
            border-radius: 5px;
            font-style: italic;
            color: #555555;
            text-align: center;
            line-height: 1.6;
        }
        
        .footer {
            background-color: #2c3e50;
            color: #ffffff;
            padding: 25px 20px;
            text-align: center;
        }
        
        .footer p {
            font-size: 13px;
            margin-bottom: 8px;
            opacity: 0.9;
        }
        
        .footer a {
            color: #3498db;
            text-decoration: none;
        }
        
        .footer a:hover {
            text-decoration: underline;
        }
        
        @media only screen and (max-width: 600px) {
            .email-container {
                border-radius: 0;
            }
            
            .content {
                padding: 25px 20px;
            }
            
            .detail-row {
                flex-direction: column;
            }
            
            .detail-label {
                width: 100%;
                margin-bottom: 5px;
            }
            
            .button {
                display: block;
                margin: 10px 0;
            }
            
            .options-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <div class="header-icon">✕</div>
            <h1>Appointment Request Update</h1>
            <p>Regarding your appointment request</p>
        </div>
        
        <!-- Content -->
        <div class="content">
            <p class="greeting">Dear {{ $appointment->user->first_name .' '. $appointment->user->last_name }},</p>
            
            <div class="status-message">
                <h2>Unable to Confirm Your Appointment Request</h2>
                <p>Thank you for your interest in scheduling an appointment with us. Unfortunately, we are unable to confirm your appointment request at this time.</p>
            </div>
            
            <!-- Request Details -->
            <div class="request-details">
                <h3>Your Appointment Details</h3>
                <div class="detail-row">
                    <span class="detail-label">Appointment ID:</span>
                    <span class="detail-value">#{{ $appointment->id }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Preferred Date:</span>
                    <span class="detail-value">{{ \Carbon\Carbon::parse($appointment->date)->format('l, F d, Y') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Preferred Time:</span>
                    <span class="detail-value">{{ \Carbon\Carbon::parse($appointment->schedule->start_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($appointment->schedule->end_time)->format('g:i A') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Service:</span>
                    <span class="detail-value">{{ $appointment->service?->title }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Consultant:</span>
                    <span class="detail-value">{{ $appointment->consultain?->name }}</span>
                </div>
            </div>
            
            
           
            
            <!-- Contact Box -->
            <div class="contact-box">
                <h3>Need Assistance?</h3>
                <div class="contact-info">
                    Our team is here to help you find a suitable appointment time.<br>
                    Please feel free to reach out:<br><br>
                    <strong>Phone:</strong> {{$info->phone}}<br>
                    <strong>Email:</strong> {{$info->email}}<br>
                    <strong>Hours:</strong> {{$info->business_hours}}
                </div>
            </div>
            
            <div class="apology-text">
                <p>"We sincerely apologize for any inconvenience this may cause. We're committed to finding a time that works for you and look forward to serving you soon."</p>
            </div>
            
            <div class="divider"></div>
            
            <p style="color: #555555; line-height: 1.6; font-size: 14px;">
                If you have any questions or would like to discuss alternative options, please don't hesitate to contact us. We're here to help make scheduling as convenient as possible for you.
            </p>
            
            <p style="margin-top: 20px; color: #555555; font-size: 14px;">
                Thank you for your understanding,<br><br>
                Best regards,<br>
                <strong>{{ $info->title }}</strong>
            </p>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p><strong>{{ $info->title }}</strong></p>
            <p>{{ $info->address }}</p>
            <p>Phone: {{$info->phone}} | Email: {{$info->email}}</p>
            <p style="margin-top: 15px;">
                <a href="{{route('home')}}">Visit our website</a> | 
                <a href="{{route('about')}}">About Us</a> | 
                <a href="{{route('contact')}}">Contact Us</a>
            </p>
        </div>
    </div>
</body>
</html>