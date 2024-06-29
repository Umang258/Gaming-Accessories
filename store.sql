-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 07:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `password`) VALUES
(1, 'tarun', '1234'),
(2, 'umang', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL,
  `brand_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `brand_image`) VALUES
(1, 'Intel', 'intel.jpg'),
(2, 'AMD', 'amd.png'),
(3, 'Asus', 'asus.jpg'),
(4, 'Zebronics', 'zeb.jpg'),
(5, 'Gigabyte', 'giga.jpg'),
(6, 'ZOTAC', 'zotac.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(50) NOT NULL,
  `date & time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`, `date & time`) VALUES
(3, '::1', 0, '2024-05-15 12:22:41'),
(1, '::1', 0, '2024-05-15 12:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(100) NOT NULL,
  `cat_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_image`) VALUES
(1, 'Processor', 'processor.jpg'),
(2, 'Motherboards', 'motherboard.jpg'),
(3, 'Graphics Cards', 'graphic.jpeg'),
(4, 'PC Cabinet', 'cpucabinet.avif'),
(5, 'CPU Coolers', 'cpucooler.png'),
(6, 'RAM', 'ram.jpeg'),
(7, 'SSD', 'ssd.jpeg'),
(8, 'Mouse', 'zeb_mouse1.jpg'),
(9, 'keyboards', 'keyboard.jpg'),
(10, 'Headphones', 'headphone.avif'),
(11, 'Mousepads', 'mousepad.jpg'),
(12, 'Moniters', 'moniter.webp');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_time` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`user_id`, `username`, `email`, `password`, `date_time`) VALUES
(1, 'tarun', 'tarun@gmail.com', '123', 2147483647),
(2, 'umang', 'umang@gmail.com', '1234', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_desc` varchar(300) NOT NULL,
  `product_desc2` varchar(500) NOT NULL,
  `product_keyword` varchar(200) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(500) NOT NULL,
  `product_image2` varchar(500) NOT NULL,
  `product_image3` varchar(500) NOT NULL,
  `product_price` int(20) NOT NULL,
  `alter_price` int(30) NOT NULL,
  `date_time` int(11) NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_desc`, `product_desc2`, `product_keyword`, `cat_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `alter_price`, `date_time`, `status`) VALUES
(1, 'Adata NVMe SSD', '256GB | 5Y warranty | performance : Read 2100MB/s , Write 1500MB/s', 'Now supporting the latest Intel and AMD platforms. No chaos with the hassle-free no-cable installation! VICTORY!! With the speed of read/write up to 2100/1500MB/s and offers a random performance of up to 250K/240K IOPS. Now transfer large files, boot, or play games with the GAMMIX S5 which helps accomplish them in a quick and effective manner. It features HMB that is Host Memory Buffer and SLC Caching for all these speedy actions! LDPC that is Low-Density Parity-Check error correcting code techn', 'SSD,memory,storage,solid disk', 7, 6, 'ss1.jpg', 'ss2.webp', 'ss3.webp', 2295, 6500, 2147483647, 'true'),
(2, 'Intel Core I5 12400F', 'Intel Core I5 12400F 12 Gen Generation Desktop Pc Processor 6, CPU with 18Mb Cache and Up to 4.40 Ghz Clock Speed Ddr5 and Ddr4 Ram Support Lga 1700 Socket, Micro ATX', 'ðŸ’ªðŸ”¥ Intel Core i5 12400F is a 12th Generation Alder lake Processor with 18MB Cache Memory. The 12400F has Total 6 Cores (6 Performance Cores) and 12 Threads. This is the Best processor CPU so Far released by Intel in I5 Range. ðŸ Intel Core i5 12400F supports latest LGA1700 Socket. Some of the supported Motherboards are Z690, B660, H670, H610 Intel Core i5 12400F Comes with 3 Years of warranty directly from Intel Brand. Both DDR5 RAM upto 4800 Mhz and DDR4 RAM upto 3200 Mhz are supported ac', 'processor,process, pro, cpu', 1, 1, 'pro1.jpg', 'pro2.jpg', 'pro3.jpg', 11499, 29999, 2147483647, 'true'),
(3, 'AMD 7000 Series Ryzen 5', 'AMD 7000 Series Ryzen 5 7600 Desktop Processor 6 cores 12 Threads 38 MB Cache 3.8 GHz Upto 5.1 GHz AM5 Socket (100-100001015BOX) Socket AM5', 'Base Clock: 3.8 GHz, Max Boost Clock: up to 5.1 GHz Memory Support: DDR5 5200MHz, Memory Channels: 2, TDP: 65W, PCI Express Generation : PCIe Gen 4 Compatible with Motherboards based on 600 Series Chipset, Socket AM5 On Chip Graphic Card , Included Heatsink Fan: Wraith Stealth', 'amd, processor , process , cpu', 1, 2, 'am1.jpg', 'am2.jpg', 'am3.jpg', 18157, 35100, 2147483647, 'true'),
(4, 'ZEBRONICS AC32FHD LED', 'ZEBRONICS AC32FHD LED Curved 75Hz 80Cm (32\") (81.28 Cm) 1920x1080 Pixels FHD Resolution Monitor with HDMI + VGA Dual Input, Built-in Speaker, Max 250 Nits Brightness, Black', 'Step up the viewing experience with the Zebronics curved LED monitor ZEB-A32FHD LED which gives you 1920x1080 FHD native resolution support and a wide screen 16:9 aspect ratio. The screen size is 80cm (32\") with 16.7 Million colors support, giving you the best wide screen viewing experience and a natural color reproduction. With the dual input port facility for HDMI and VGA, the monitor is compatible to be used a with varied range of devices and video resolutions up to 1920x1080 FHD. 75Hz refres', 'led, LED , display,moniter', 12, 4, 'ze1.webp', 'ze2.jpg', 'ze3.jpg', 10299, 29999, 2147483647, 'true'),
(5, 'Geforce GTX 1650', 'Zotac Gaming Geforce GTX 1650 Amp Core Gddr6 4Gb 128Bit Pcie 3.0 Graphics Card with 1650 Mhz Boost Clock&5 Years Warranty (2 Years Warranty + 3 Years Extended Warranty)', 'Factory Overclocked to AMP Core Turing Encoder Super Compact 4K Ready 70mm Twin Fan 4GB GDDR6 Memory 1650 MHz Boost Engine Clock', 'graphics,card,gpu,Graphics card', 3, 6, 'gt2.jpg', 'gt2.jpg', 'gt2.jpg', 13995, 22755, 2147483647, 'true'),
(6, 'ZEBRONICS Duke', 'ZEBRONICS Duke 60hrs Playtime Bluetooth Wireless Over Ear Headphone with Mic (Black)', 'Zeb-Duke is a wireless headphone with a mic that is an up on style with comfortable ear cushions, adjustable headband, and RGB lights. Inline Remote : Yes Speaker Impedance 32ΩFrequency Response 20Hz - 20kHz.Bluetooth works in range of 10 m only without obstacles Charging time 2hrs, Playback time 60 hrs*,Talk time 30 hrs* Wireless BTVoice assistant supportAUX Function Adjustable HeadbandMedia/Volume controlCall FunctionBuilt-in Rechargeable Battery There is a voice assistant feature, a multifunc', 'headphone,head,speaker,zebronics', 10, 4, 'he.jpg', 'he.jpg', 'he.jpg', 1335, 1999, 2147483647, 'true'),
(7, 'ZEBRONICS-Transformer-M', 'ZEBRONICS-Transformer-M with a High-Performance Gold-Plated USB Mouse: 6 Buttons, Multi-Color LED Lights,High-Resolution Sensor with max 3600 DPI, and DPI Switch(Black)', 'Gaming mouse: ZEB-Transformer-M premium gaming mouse is designed for gamers who want the perfect fusion of high DPI, precision gaming along with LED lights. Breathing LED- Your gaming is going to get LIT as the gaming mouse comes with 7 colors breathing LED that will charm the gamer in you. Ergonomic design:The ZEB-Transformer-M gaming mouse comes in an ergonomic design that provides comfort for long hours. Works on most surfaces: The mouse is designed to work on all surfaces and comes with a pl', 'Mouse,Gaming Mouse, RGB light', 8, 4, 'zeb_mouse1.jpg', 'zeb_mouse2.jpg', 'zeb_mouse3.jpg', 399, 999, 2147483647, 'true'),
(8, 'Gaming Keyboard', 'ZEBRONICS Transformer-k USB Gaming Keyboard with Multicolor LED Effect,Durable Al Body,Gold Plated USB,Braided Cable', 'Zeb-Transformer-k is a USB Gaming Keyboard with Multicolor LED Effect. It has Integrated media control,Laser keycaps, Aluminum body, Backlight LED On / Off function It also has Braided cable USB connector. Interface : USB Power requirement : DC 5V, <200mA Button stokes life : 80 million times 1 Year Warranty. Carry into Service Center. For List of Service Centers, see Product Information', 'keyboard, zebronics,key,reb', 9, 4, 'key.jpg', 'key.jpg', 'key.jpg', 890, 1699, 2147483647, 'true'),
(9, 'GIGABYTE B450M', 'GIGABYTE B450M DS3H V2 (AMD Ryzen AM4/Micro ATX/M.2/HMDI/DVI/USB 3.1/DDR4/Motherboard)', 'Supports AMD 3rd Gen Ryzen/ 2nd Gen Ryzen/ 1st Gen Ryzen/ 2nd Gen Ryzen with Radeon Vega Graphics/ 1st Gen Ryzen with Radeon Vega Graphics/ Athlon with Radeon Vega Graphics Processors;Dual Channel Non-ECC Unbuffered DDR4, 4 DIMMs GIGABYTE Exclusive 8118 Gaming LAN with Bandwidth Management;RGB Fusion supports RGB LED Strips in 7-Colors Smart Fan 5 Features 5 Temperature Sensors and 2 Hybrid Fan Headers with FAN STOP;APP Center Including EasyTune and Cloud Station Utilities Graphics Card Interfac', 'giga,gigabyte,motherboard', 2, 5, 'gi.webp', 'gi.webp', 'gi.webp', 4999, 9100, 2147483647, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `review` varchar(255) NOT NULL,
  `date_time` int(11) NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `username`, `review`, `date_time`, `product_id`, `email`) VALUES
(1, '', '', 0, 0, ''),
(2, 'fwfwfw', '', 0, 0, 'fwf'),
(3, 'dada', '', 0, 0, 'dada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
