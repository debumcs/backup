-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2017 at 08:27 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brahma_shakti`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE IF NOT EXISTS `about_us` (
`id` int(11) NOT NULL,
  `file_link` varchar(500) NOT NULL,
  `title` varchar(150) NOT NULL,
  `child_link` varchar(45) NOT NULL,
  `content` varchar(4000) NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `ipadd` varchar(45) NOT NULL,
  `parent_link` varchar(45) NOT NULL DEFAULT 'About_us',
  `date` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `file_link`, `title`, `child_link`, `content`, `created_by`, `ipadd`, `parent_link`, `date`) VALUES
(1, '/bharam_shakti/images/aboutusslider.jpg', 'ABOUT US', 'ABOUT US', '<p>The origin of Brahmashakti Special School under the aegis of Ekta Shakti Foundation had been was started with two mentally challenged children in the year 2006 at village Matiyala, Uttam Nagar, New Delhi. Currently it works with two campuses at Uttam Nagar and Dwarka, New Delhi. Eighty-five mentally challenged and differently abled children from all sections of society are enrolled in the school to enable them to become an integral part of the society and to equip them with all the necessary skills to lead an independent life.</p>\r\n', 'Admin', '127.0.0.1', 'About_us', '2017-03-18 20:06:53.000000'),
(2, '/bharam_shakti/images/objective.jpg', 'OBJECTIVE', 'OBJECTIVE', '<h3>Our objective is to:</h3>\r\n\r\n<ul>\r\n	<li>To impart education and therapy to children with special needs.</li>\r\n	<li>To providing pre-vocational and vocational services with a view to make these children independent.</li>\r\n	<li>To provide therapies and impart counselling sessions.</li>\r\n</ul>\r\n', 'Admin', '127.0.0.1', 'About_us', '2017-03-18 20:08:08.000000'),
(3, '/bharam_shakti/images/history.jpg', 'HISTORY', 'HISTORY', '<p>Brahmashakti Special School was started in the year 2006 with 2 children in Matiyala village, Uttam Nagar by Ekta Shakti Foundation.</p>\r\n\r\n<p>The purpose behind starting this initiative was to make children with special needs become self reliant and independent in their day today life. Gradually the strength of the students in our school started rising and parents from far of places started sending their children to our school thus the organization decided to start two campuses for the school. Presently the two campuses are at Uttam Nagar and Dwarka with strength of 45 and 40 respectively.</p>\r\n', 'Admin', '127.0.0.1', 'About_us', '2017-03-18 20:08:57.000000'),
(4, '/bharam_shakti/images/Anil-Aggrwal .jpg', 'FOUNDER''S MESSAGE', 'FOUNDER''S MESSAGE', '<p>As the founder of the Brahmashakti Special School it gives me immense pleasure to offer special services to the families and work hard to meet the needs of the children. Our prime focus is to provide all required services and facilities to the children with special needs. We strive to provide nurturing and enabling environment to children where they can learn and develop their skills to become responsible and self-reliant.</p>\r\n\r\n<p>We take extra care to support each child to overcome difficulties and meet their challenges by recognizing their strengths. Our well trained staff commits itself in providing all the necessary to assistance to each and every child with professional consistency.</p>\r\n\r\n<p>We look forward to getting support from all the responsible citizens and parents to make this world a better place for children with special needs.</p>\r\n', 'Admin', '127.0.0.1', 'About_us', '2017-03-18 20:10:14.000000');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE IF NOT EXISTS `facilities` (
`id` int(11) NOT NULL,
  `file_link` varchar(500) NOT NULL,
  `title` varchar(150) NOT NULL,
  `child_link` varchar(45) NOT NULL,
  `content` varchar(4000) NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `ipadd` varchar(45) NOT NULL,
  `parent_link` varchar(45) NOT NULL DEFAULT 'Facilities',
  `date` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `file_link`, `title`, `child_link`, `content`, `created_by`, `ipadd`, `parent_link`, `date`) VALUES
(1, '/bharam_shakti/images/facilities.jpg', 'FACILITIES', 'FACILITIES', '<h3>DAY CARE</h3>\r\n\r\n<p>Brahmashakti Special School runs Day Care Centre within the campus and puts extra effort for child&rsquo;s educational and therapeutic needs. The centre is equipped with facilities to care of the child in a stimulating, safe, fun-filled and structured hygienic environment. Our philosophy behind running the day care center is simple &quot;We Put Your Child First&quot;. We provide a safe, comfortable, clean, loving, home-like environment where children can play and learn respect towards self, others and the environment our efficient and trained staff tenderly cares for the little ones and professionally handles their sensitive needs.</p>\r\n\r\n<p>Besides engagement in constructive activities like Art &amp;Craft, Computers, Story Sessions, games etc, emphasis is also made for children&rsquo;s educational and therapeutic needs. The children&#39;s nutritional needs are met with utmost care and they are provided with lunch and snacks during their time at the facility. Transport facility is also available.</p>\r\n', 'Admin', '127.0.0.1', 'Facilities', '2017-03-18 20:13:49.000000'),
(2, '/bharam_shakti/images/day.jpg', 'DAY CARE', 'DAY CARE', '<p>Brahmashakti Special School runs Day Care Centre within the campus and puts extra effort for child&rsquo;s educational and therapeutic needs. The centre is equipped with facilities to care of the child in a stimulating, safe, fun-filled and structured hygienic environment. Our philosophy behind running the day care center is simple &quot;We Put Your Child First&quot;. We provide a safe, comfortable, clean, loving, home-like environment where children can play and learn respect towards self, others and the environment our efficient and trained staff tenderly cares for the little ones and professionally handles their sensitive needs.</p>\r\n\r\n<p>Besides engagement in constructive activities like Art &amp;Craft, Computers, Story Sessions, games etc, emphasis is also made for children&rsquo;s educational and therapeutic needs. The children&#39;s nutritional needs are met with utmost care and they are provided with lunch and snacks during their time at the facility. Transport facility is also available.</p>\r\n', 'Admin', '127.0.0.1', 'Facilities', '2017-03-18 20:14:33.000000'),
(3, '/bharam_shakti/images/transporation.jpg', 'TRANSPORTATION', 'TRANSPORTATION', '<p>We in Brahmashakti Special School provide well organized transport facilities to our children.</p>\r\n\r\n<p>We ensure that transportation is safe and comfortable for our children. Special Educators accompany children to ensure their safety. Every possible measure is taken to ensure that the children travel to and from school every day in safe and comfortable manner.</p>\r\n\r\n<p>Transport facility to children living in close vicinity is provided on special request. This facility is also provided to staff and faculty members.</p>\r\n\r\n<p>The need for safe passage of each child to school and back home is of paramount importance to us. To ensure safe travel the school has its own fleet of outsourced school Eco Vans designed as per standards and manned by trained drivers and personnel sensitized to the needs of small children.</p>\r\n\r\n<p>Mobile phones have been provided in each van that ensures efficiency in terms of service and better communication in case of emergencies. Besides ensuring the implementation of the safety norms, all staff on the van is well trained in first aid and emergency management.</p>\r\n', 'Admin', '127.0.0.1', 'Facilities', '2017-03-18 20:15:31.000000'),
(4, '/bharam_shakti/images/art&craft.jpg', 'ART & CRAFT', 'ART & CRAFT', '<p>We in Brahmashakti Special School lay great emphasis on Art Education which includes exposure to the various domains of Art and Craft - Sketching, Painting, Poster Making, Clay Modeling, Wood Craft etc. - for a true coordination of 3 Hs - Head, Heart and Hand.</p>\r\n\r\n<p>Required facilities are provided to the students for art &amp; craft activities. We recruit professional and high experienced teachers for Art &amp; Craft activities to provide guidance to our children.</p>\r\n\r\n<p>We provide meticulous training in the field of Art &amp; Craft. Children are trained in sketching, coloring, drawing, inking, dyeing, paper work, craft work and thermocol cutting.</p>\r\n', 'Admin', '127.0.0.1', 'Facilities', '2017-03-18 20:16:20.000000'),
(5, '/bharam_shakti/images/dance1.jpg', 'DANCE & MUSIC', 'DANCE & MUSIC', '<p>Our Special educators teach dance and music to all the students and help them in participating in various events. Our children have also won many competitions. (please read our success stories)</p>\r\n', 'Admin', '127.0.0.1', 'Facilities', '2017-03-18 20:17:04.000000'),
(6, '/bharam_shakti/images/yoga.jpg', 'YOGA CLASSES', 'YOGA CLASSES', '<p>We in Brahmashakti Special School host daily Yoga classes for our children. Flexibility of body and mental peace are some of the key benefits of regular yoga. It is a compulsory activity in the school and no extra charges are taken for this.</p>\r\n\r\n<p>Adaptive yoga for children with special needs is a fabulous resource for parents, aides, teachers, physical therapists, occupational therpaists and more. Yoga is available to everyone and is easy to adapt to meet individual needs and requirements. It is a powerful form of physical and mental self exploration with tremendous benefits.</p>\r\n\r\n<p>We provide the best and healthful yoga classes to our children under the guidance of professional teachers.</p>\r\n\r\n<p>The School believe that - &quot;Yoga helps children become stronger and smarter. It also enhances their immunity and sharpens their memory.&quot;</p>\r\n', 'Admin', '127.0.0.1', 'Facilities', '2017-03-18 20:17:41.000000'),
(7, '/bharam_shakti/images/sports.jpg', 'SPORTS', 'SPORTS', '<p>Brahmashakti Special School strongly believes in the saying: &quot;A healthy body is the key to a healthy mind&quot;. We provide sports facilities to encourage physical fitness and provide recreational activities to our children.</p>\r\n\r\n<p>The Brahmashakti Special School strongly believes in the saying: &quot;A healthy body is the key to a healthy mind&quot;.</p>\r\n\r\n<p>We encourage our children to participate in various sports competitions conducted by different platforms like other Special Schools and Special Olympics. Our children have not only participated but also won many medals, cash prizes and certificates.</p>\r\n', 'Admin', '127.0.0.1', 'Facilities', '2017-03-18 20:18:25.000000');

-- --------------------------------------------------------

--
-- Table structure for table `indexx`
--

CREATE TABLE IF NOT EXISTS `indexx` (
`id` int(11) NOT NULL,
  `file_link` varchar(700) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(600) NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `ipadd` varchar(45) NOT NULL,
  `parent_link` varchar(45) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `indexx`
--

INSERT INTO `indexx` (`id`, `file_link`, `title`, `content`, `created_by`, `ipadd`, `parent_link`, `date`) VALUES
(1, '/bharam_shakti/images/child1.jpg', 'SPECIAL EDUCATION', '<p>We provide well planned systematic method of education to promote learning.</p>\r\n', 'Admin', '127.0.0.1', 'REHABILITATION SERVICES', '2017-03-20 14:26:08'),
(2, '/bharam_shakti/images/child.jpg', 'THERAPY', '<p>We believe that every child with special needs can make significant improvement when provided the most appropriate therapeutic interventions.</p>\r\n', 'Admin', '127.0.0.1', 'REHABILITATION SERVICES', '2017-03-20 14:26:28'),
(3, '/bharam_shakti/images/child2.jpg', 'EARLY INTERVENTION', '<p>We help in identifying the developmental delays in a child and help parents in providing a supportive and enriching environment for children.</p>\r\n', 'Admin', '127.0.0.1', 'REHABILITATION SERVICES', '2017-03-20 13:28:57'),
(4, '/bharam_shakti/images/CHILD3.jpg', 'PRE VOCATIONAL ', '<p>We encourage children to develop responsibility, independence, self reliance and self worth.</p>\r\n', 'Admin', '127.0.0.1', 'REHABILITATION SERVICES', '2017-03-20 13:31:47'),
(5, '/bharam_shakti/images/event.jpg', 'NEWS & EVENTS', '<p>School hosted games, art &amp; craft competitions, and dance for the students in the school premises.</p>\r\n', 'Admin', '127.0.0.1', 'MEDIA_INDEX', '2017-03-20 14:56:26'),
(6, '/bharam_shakti/images/success-stories.jpg', 'SUCCESS STORIES', '<p>Aarti came to Brahmashakti Special School in the year 2010.</p>\r\n', 'Admin', '127.0.0.1', 'MEDIA_INDEX', '2017-03-20 14:57:18'),
(7, '/bharam_shakti/images/null', 'TESTIMONIAL', '<p><strong>Anant&rsquo;s mother</strong> Anant has been coming to Brahmashakti Special School since last 4-5 years and his social skills have become quite good and has improved a lot in that. He has started enjoying skating, football, badminton and other games and has started learning them.</p>\r\n\r\n<p><strong>Naman&rsquo;s Mother</strong> I am really thankful to school authority members who have taken so much of pains and efforts to bring so much good results in my child.</p>\r\n', 'Admin', '127.0.0.1', 'MEDIA_INDEX', '2017-03-20 16:17:07'),
(8, '/bharam_shakti/images/event-home.jpg', 'PHOTO GALLERY', '<p>An Evening of Hope amid Corporate Leaders On October 16, 2016,</p>\r\n', 'Admin', '127.0.0.1', 'MEDIA_INDEX', '2017-03-20 15:10:16'),
(9, '/bharam_shakti/images/null', 'Brahmashakti Special School believes in making all possible efforts in transforming lives of children with special needs.', '<p>The origin of Brahmashakti Special School under the aegis of Ekta Shakti Foundation had been only with five mentally challenged children in the year 2006 at village Matiala, Uttam Nagar, New Delhi. Currently it works with two campuses at Uttam Nagar and Dwarka, New Delhi.</p>\r\n', 'Admin', '127.0.0.1', 'HISTORY_INDEX', '2017-03-20 16:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `sex` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `name`, `password`, `email`, `sex`, `country`) VALUES
(1, 'admin', 'hemant', 'admin', 'root', 'male', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE IF NOT EXISTS `news_events` (
`id` int(11) NOT NULL,
  `file_link` varchar(1000) NOT NULL,
  `file_link2` varchar(1000) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sdate` date NOT NULL,
  `description` varchar(100) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `ipadd` varchar(45) NOT NULL,
  `parent_link` varchar(45) NOT NULL DEFAULT 'News',
  `datetm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `news_events`
--

INSERT INTO `news_events` (`id`, `file_link`, `file_link2`, `title`, `sdate`, `description`, `content`, `created_by`, `ipadd`, `parent_link`, `datetm`) VALUES
(1, '/bharam_shakti/images/viaan-img.jpg', '/bharam_shakti/images/viaan-img-inside.jpg', 'VIAAN, UTKAANSH', '2013-01-01', 'VIAAN, UTKAANSH', '<p>Our student Akansha participated in Dance and Fashion Competition named &ldquo;VIAAN, UTKAANSH&rdquo; &ndash; a festival of colour. The Competion was conducted by Shankara Special School , New Delhi. Akansha was one of the 5 top selected contestants to perform solo dance. She performed in Grand Finale and won appreciation prize.</p>\r\n', 'Admin', '127.0.0.1', 'News', '2017-03-20 07:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
`id` int(11) NOT NULL,
  `file_link` varchar(500) NOT NULL,
  `title` varchar(150) NOT NULL,
  `child_link` varchar(45) NOT NULL,
  `content` varchar(4000) NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `ipadd` varchar(45) NOT NULL,
  `parent_link` varchar(45) NOT NULL DEFAULT 'Services',
  `date` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `file_link`, `title`, `child_link`, `content`, `created_by`, `ipadd`, `parent_link`, `date`) VALUES
(1, '/bharam_shakti/images/special-education.jpg', 'SPECIAL EDUCATION', 'SPECIAL EDUCATION', '<h3>What is Special Education?</h3>\r\n\r\n<p>Special education is a program designed for children with special needs i.e. children whose overall development in terms of physical, cognitive and cognitive skills have delayed and have placed them behind their peer group. Traditional classroom environment does not suffice to cater with the requirements of children with special needs therefore special education is specially designed instruction, support and services meeting the requirements of individual child to meet their unique learning needs.</p>\r\n\r\n<p>In <strong>Brahmashakti Special School</strong> special education is available for every child depending upon the individual needs. The school focuses on the overall development of every child attending the school. Every child attending the school is evaluated under special education process and separate file is maintained for each of them. This evaluation includes assessment of the child in all areas related to the suspected disability. The evaluation result thus is used to decide the child&rsquo;s eligibility for special education and related services and decisions about appropriate educational program for the child.</p>\r\n\r\n<p>All activities within the day programme work towards goals set out in each child&rsquo;s Individualized Education Programme (IEP). Activities are designed to work on communication goals, whether they be receptive or expressive, verbal or non-verbal, social skills, motor skills, behaviour goals, and independence, at levels appropriate for each child.</p>\r\n\r\n<p>Brahmashakti Special special education programme runs from <strong> 8:30 AM to 3:00 PM Monday to Friday.</strong></p>\r\n\r\n<h3>Our special education programme includes:</h3>\r\n\r\n<ul>\r\n	<li>Academics</li>\r\n	<li>Home Economics <strong>(Social Skill, Activity of daily living)</strong></li>\r\n	<li>Gardening</li>\r\n	<li>Physical Education</li>\r\n	<li>Picnic</li>\r\n	<li>Educational Trip</li>\r\n	<li>Targeted Activities</li>\r\n	<li>Vocational Training</li>\r\n</ul>\r\n\r\n<h3>Children who are provided with special education support:</h3>\r\n\r\n<p><strong>Children with autism / pervasive developmental disorder (PDD):</strong> a disability that affects verbal and non-verbal communication, social interaction, and leisure or play activities.</p>\r\n\r\n<p><strong>Children with developmental disabilities: </strong> significant delays in the rate of learning, the development of social interactions and the acquisition of life skills.</p>\r\n\r\n<p><strong>Children with emotional and behaviour challenges:</strong>difficulty developing and keeping relationships with other students and adults, and with social skills, personal adjustment, self-care and general classroom behaviour.</p>\r\n\r\n<p><strong>Children with physical disabilities:</strong> hearing and vision impairment, significant medical conditions and head injuries, etc.</p>\r\n', 'Admin', '127.0.0.1', 'Services', '2017-03-18 20:21:12.000000'),
(2, '/bharam_shakti/images/therapy.jpg', 'THERAPY', 'THERAPY', '<h3>Therapy Services</h3>\r\n\r\n<p>We in Brahmashakti Special School provide various therapy services to our students under the guidence of well trained therapists. These therapy services include-</p>\r\n\r\n<p>As part of the curriculum our therapists developed a treatment plan according to the needs of the child.</p>\r\n\r\n<ul>\r\n	<li>Speech and Language Therapy</li>\r\n	<li>Physiotherapy</li>\r\n	<li>Occupational Therapy</li>\r\n</ul>\r\n', 'Admin', '127.0.0.1', 'Services', '2017-03-18 20:21:49.000000'),
(3, '/bharam_shakti/images/early-intervention.jpg', 'EARLY INTERVENTION', 'EARLY INTERVENTION', '<p>Early intervention includes providing services to the child to the earliest in his/her developmental stage. This early intervention is necessary because it is during these first five years that a child learns and develops at the fastest rate. At the age of three the child becomes eligible for educational services. The goal is to help the child achieve highest possible functioning and interaction both at home and community.</p>\r\n\r\n<p>Educational Services and therapies in cases of early intervention is based on Psychological Assessment of the child which is being done at the time of admission of the child.</p>\r\n', 'Admin', '127.0.0.1', 'Services', '2017-03-18 20:22:32.000000'),
(4, '/bharam_shakti/images/pre-vocational-2.jpg', 'PRE VOCATIONAL', 'PRE VOCATIONAL', '<p>Self-esteem, a positive identity, and a sense of accomplishment are benefits that vocational training and employment can offer to a person. The opportunity to be a productive worker and to contribute to the community promotes independence and enhances awareness of the value of persons with disabilities.</p>\r\n\r\n<p>The Brahmashakti Special School Vocational programs for students assist them to discover interests and to develop the skills necessary for employment in the community. Each individual has the opportunity to experience a variety of vocational opportunities. Preferences of the students are identified, intensive training is provided to assist students in acquiring the vocational and social skills essential to employment success.</p>\r\n\r\n<p>We in Brahmashakti Special School provide vocational trainings to our students. For this we focus on :</p>\r\n\r\n<ul>\r\n	<li>individual needs and abilities.</li>\r\n	<li>independent living skill development.</li>\r\n	<li>personal interests and goals.</li>\r\n</ul>\r\n\r\n<p>Thus we prepare our students for to be independent both in their personal as well as in professional lives.</p>\r\n', 'Admin', '127.0.0.1', 'Services', '2017-03-18 20:23:03.000000'),
(5, '/bharam_shakti/images/speech-therapy.jpg', 'SPEECH THERAPY', 'SPEECH THERAPY', '<h3>SPEECH AND LANGUAGE THERAPY</h3>\r\n\r\n<p>There can be many reasons for speech and language development of a child -conditions like cerebral Palsy, autism, hearing loss, developmental delays. Sometimes children may comprehend the language but fail to communicate due to difficulty in their speech in other cases they may find challenge in hand gestures and facial expressions.</p>\r\n\r\n<p>Speech therapy is a clinical program designed to improve language skills and motor abilities. It involves treatment of speech and communication disorders. Children may have different speech and language problems. For example children who are able to talk but need to work on clearer speech or building language by learning new words, speak in sentences or learning skills. Children who cannot talk can learn sign languages Speech therapists may use or special equipments which may speak for them. Children who can talk but struggle but struggle with communication issues likes facial expression or gestural language use.</p>\r\n\r\n<p>Speech therapists use different methods to work speech and language issues depending upon the challenge.</p>\r\n\r\n<p>Articulation Disorders</p>\r\n\r\n<p>For articulation problems speech therapists may use popsicle sticks, fingers, whistles, straws to help child gain control over the muscles of the mouth, tongue or throat.</p>\r\n\r\n<p>Fluency Disorders</p>\r\n\r\n<p>it is disruption in the fluency of speech and is also called &ldquo;disfluencies&rdquo;. For example some words are repeated and others preceded by &ldquo;um&rdquo; or &ldquo;uh&rsquo;. It impedes communication when to many of them are produced while speaking.</p>\r\n', 'Admin', '127.0.0.1', 'Services_Therapy', '2017-03-18 20:24:09.000000'),
(6, '/bharam_shakti/images/phi.jpg', 'PHYSIO - THERAPY', 'PHYSIO - THERAPY', '<h3>PHYSIOTHERAPY</h3>\r\n\r\n<p>Cerebral Palsy (CP) is a group of neurological disorders that can appear in pre-natal, natal and post-natal stage due to various reasons some of which are jaundice or fever in pregnant woman, low birth weight, malnutrition, traumatic brain injury and many more. These causes damage or bring abnormalities in the developing brain of the child which in turn affect the body movement or muscle coordination resulting in disruption of brain to control and maintain posture and balance.</p>\r\n\r\n<p>Symptoms for CP include &ndash;</p>\r\n\r\n<ul>\r\n	<li>Hypotonia &ndash; Low Muscle tone which involve low muscle strength</li>\r\n	<li>Hypertonia &ndash; High Muscle tone which involve reduced ability of muscle to stretch</li>\r\n	<li>Dystonia &ndash; Fluctuation Muscle tone</li>\r\n	<li>Exaggerated Reflexes</li>\r\n	<li>Poor Posture</li>\r\n	<li>Impaired Balance and Coordination</li>\r\n	<li>Abnormal Movements</li>\r\n	<li>Abnormal Gait</li>\r\n</ul>\r\n\r\n<p>Associated symptoms of CP include &ndash;</p>\r\n\r\n<ul>\r\n	<li>Hearing impairment</li>\r\n	<li>Speech Impairment</li>\r\n	<li>Poor Vision</li>\r\n	<li>Mental Retardation</li>\r\n	<li>Epilepsy</li>\r\n	<li>Low IQ</li>\r\n</ul>\r\n\r\n<p>Physiotherapy plays important role in managing condition of cerebral palsy. It focuses on function and movement of the child. It approaches to improve, maintain and restore physical, psychological and well-being of the child. It works on rehabilitation applications to make sensorial and motor functions normal, provide normal posture and independent functional activity, regulate muscle tone, improve the quality of the existing movements and prevent contracture and deformities.</p>\r\n\r\n<p>The physiotherapists assess and evaluate the child&rsquo;s requirement. Based on this assessment the child is provided required physiotherapy. This involves active and passive exercise for the child. In active exercise the child is made to exercise independently on the instruction of the physiotherapists and in passive exercise the child exercises with the help of the physiotherapists.</p>\r\n\r\n<p>Physiotherapists in our school use various methods to improve motor skills of children.</p>\r\n\r\n<p>These include-</p>\r\n\r\n<ul>\r\n	<li>Wedges for neck holding and trunk control</li>\r\n	<li>Equilibrium Board to maintain balance and coordination</li>\r\n	<li>Weight cuffs for strengthening sensory stimulation</li>\r\n	<li>Shoulder Ladder to increase range of shoulder joint</li>\r\n	<li>Therapy ball to facilitate the weak structure and to improve strength</li>\r\n	<li>Finger exerciser to improve hand function</li>\r\n	<li>Static cycle to improve lower limb strength</li>\r\n	<li>Steppers to improve gait</li>\r\n	<li>Orthotics assistive devices to improve the function of the body</li>\r\n</ul>\r\n', 'Admin', '127.0.0.1', 'Services_Therapy', '2017-03-18 20:25:45.000000'),
(7, '/bharam_shakti/images/occupational.jpg', 'OCCUPATIONAL THERAPY', 'OCCUPATIONAL THERAPY', '<h3>Occupational therapy</h3>\r\n\r\n<p>Occupational therapy is a therapy which uses activities to improve child&rsquo;s motor control, coordination, sensory processing, self -care and play skills. The goals of occupational therapy are improve participation and performance of the child in all his/her occupation like self-care, play, school and other daily activities. The occupational therapists assess the child and accordingly modify the environment and working style to better participation of child in the activity. They work with the child to improve child&rsquo;s specific skills and perform better.</p>\r\n\r\n<p>Occupational Therapy helps the children with special needs by-</p>\r\n\r\n<ul>\r\n	<li>Promoting independence.</li>\r\n	<li>Increasing participation in the society.</li>\r\n	<li>Facilitating motor development and function.</li>\r\n	<li>Improving strength and muscle tone.</li>\r\n	<li>Enhancing learning opportunities.</li>\r\n	<li>Easing care giving.</li>\r\n	<li>Promoting health and well-being.</li>\r\n	<li>Using assistive devices which would result in improved posture, balance and mobility.</li>\r\n	<li>Improving visual perceptual skills which would help in classroom learning and academics.</li>\r\n	<li>Improving handwriting skills.</li>\r\n	<li>Promoting health and well-being.</li>\r\n	<li>Improving oral motor skills.</li>\r\n	<li>Improving communication and socio-emotional skills.</li>\r\n</ul>\r\n\r\n<p>Occupational Therapists in our school help children with help of various devices&ndash;</p>\r\n\r\n<ul>\r\n	<li>Physiorole &ndash; to provide unparalleled control</li>\r\n	<li>Equilibrium board &ndash; to encourage rhythm balance and coordination</li>\r\n	<li>Trampoline &ndash; to encourage balance and muscle control. Also to encourage confidence and feeling of success</li>\r\n	<li>Peg boards &ndash; to recognize shape and numbers</li>\r\n	<li>Flash cards &ndash; to recognize objects, numerical, colours, alphabets</li>\r\n	<li>Inclined mat &ndash; to rolling and crawling</li>\r\n	<li>Bolsters &ndash; for rocking exercises</li>\r\n	<li>Bean Bags &ndash; to improve sensory inputs</li>\r\n</ul>\r\n', 'Admin', '127.0.0.1', 'Services_Therapy', '2017-03-18 20:26:32.000000');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`id` int(11) NOT NULL,
  `file_link` varchar(400) NOT NULL,
  `title` varchar(100) NOT NULL,
  `button_text` varchar(45) NOT NULL,
  `button_link` varchar(100) NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `ipadd` varchar(45) NOT NULL,
  `date` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `file_link`, `title`, `button_text`, `button_link`, `created_by`, `ipadd`, `date`) VALUES
(4, '/bharam_shakti/images/special-education2.jpg', 'every child needs supervision we need little more...', 'FACILITIES', 'Default-facilities.jsp', 'Admin', '127.0.0.1', '2017-03-21 04:39:55.000000'),
(5, '/bharam_shakti/images/slide2.jpg', 'come and join hands with us...', 'KNOW MORE', '#', 'Admin', '127.0.0.1', '2017-03-18 17:13:25.000000'),
(6, '/bharam_shakti/images/services.png', 'Guidance can help us win the world... ', 'SERViCES', 'Default-services.jsp', 'Admin', '127.0.0.1', '2017-03-21 04:40:07.000000'),
(7, '/bharam_shakti/images/donate.png', 'small help can bring big changes', 'DONATE', '#', 'Admin', '127.0.0.1', '2017-03-18 17:15:15.000000'),
(8, '/bharam_shakti/images/slidemedia.jpg', 'know us not only with our needs but also with our deeds ', 'MEDIA', 'Default-media1.jsp', 'Admin', '127.0.0.1', '2017-03-21 04:52:47.000000');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
`id` int(11) NOT NULL,
  `file_link` varchar(500) NOT NULL,
  `title` varchar(150) NOT NULL,
  `position` varchar(60) NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `ipadd` varchar(45) NOT NULL,
  `date` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `file_link`, `title`, `position`, `created_by`, `ipadd`, `date`) VALUES
(5, '/bharam_shakti/images/atishek-sir.jpg', 'ATISHEK KUMAR', '(VICE PRINCIPAL)', 'Admin', '127.0.0.1', '2017-03-18 20:38:06.000000'),
(6, '/bharam_shakti/images/vika-sir.jpg', 'VIKAS TRIPATHI ', '(SPEECH THERAPIST) ', 'Admin', '127.0.0.1', '2017-03-18 20:38:29.000000'),
(7, '/bharam_shakti/images/mukesh.jpg', 'MUKESH KUMAR', '(PHYSIO THERAPIST) ', 'Admin', '127.0.0.1', '2017-03-18 20:38:55.000000'),
(8, '/bharam_shakti/images/babita.jpg', 'BAVITA SINGH ', '(SPECIAL EDUCATOR) ', 'Admin', '127.0.0.1', '2017-03-18 20:39:23.000000'),
(9, '/bharam_shakti/images/shweta.jpg', 'SWETA RATHORE ', '( SPECIAL EDUCATOR ) ', 'Admin', '127.0.0.1', '2017-03-18 20:39:50.000000'),
(12, '/bharam_shakti/images/alam.jpg', 'MANAUWER ALAM', '(SPEECH THERAPIST) ', 'Admin', '127.0.0.1', '2017-03-18 20:42:49.000000'),
(13, '/bharam_shakti/images/mita.jpg', 'MEETA JAIN', '(SPECIAL EDUCATOR)', 'Admin', '127.0.0.1', '2017-03-18 20:43:27.000000'),
(14, '/bharam_shakti/images/nisha.jpg', 'NISHA DADWAL ', '(SPECIAL EDUCATOR) ', 'Admin', '127.0.0.1', '2017-03-18 20:43:57.000000'),
(15, '/bharam_shakti/images/ankita.jpg', 'ANKITA ', '(SPECIAL EDUCATOR)', 'Admin', '127.0.0.1', '2017-03-18 20:44:33.000000'),
(16, '/bharam_shakti/images/toshika.jpg', 'TOSHIKA NEGI ', '(SPECIAL EDUCATOR) ', 'Admin', '127.0.0.1', '2017-03-18 20:45:02.000000'),
(17, '/bharam_shakti/images/sonam.jpg', 'SONAM SAIN', '( SPECIAL EDUCATOR ) ', 'Admin', '127.0.0.1', '2017-03-18 20:45:34.000000'),
(20, '/bharam_shakti/images/staff1.jpg', 'SANDEEP', '(SPECIAL EDUCATOR)', 'Admin', '127.0.0.1', '2017-03-18 20:47:51.000000'),
(21, '/bharam_shakti/images/staff1.jpg', 'SHIVANI ', '( PHYSIO THERAPIST ) ', 'Admin', '127.0.0.1', '2017-03-18 20:51:43.000000'),
(22, '/bharam_shakti/images/staff1.jpg', 'GOSHILA', '(ART & CRAFT TEACHER)', 'Admin', '127.0.0.1', '2017-03-18 20:52:26.000000'),
(23, '/bharam_shakti/images/staff1.jpg', 'PUNEET KUMAR', '(SPECIAL EDUCATOR)', 'Admin', '127.0.0.1', '2017-03-18 20:53:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `success_stories`
--

CREATE TABLE IF NOT EXISTS `success_stories` (
`id` int(11) NOT NULL,
  `file_link` varchar(1000) NOT NULL,
  `file_link2` varchar(1000) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sdate` date NOT NULL,
  `description` varchar(100) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `ipadd` varchar(45) NOT NULL,
  `parent_link` varchar(45) NOT NULL DEFAULT 'Success',
  `datetm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `success_stories`
--

INSERT INTO `success_stories` (`id`, `file_link`, `file_link2`, `title`, `sdate`, `description`, `content`, `created_by`, `ipadd`, `parent_link`, `datetm`) VALUES
(1, '/bharam_shakti/images/akansha-img.jpg', '/bharam_shakti/images/akansha-img-inside.jpg', 'AKANSHA', '2013-01-01', 'Akansha came to our School in the year 2014. ', '<p>Akansha came to our School in the year 2014. She was a slow learner and lacked behind not only in studies but also in her day today activities so many considered her to be lazy. When she took admission in our school our special educators first started working in her core areas of interest. They found that Akansha was very much interested in dance, art &amp; craft and games. Hence we decided to train her for dance, art &amp; craft and sports besides helping her in academics. Initially teachers thought that her disability would become an impediment but she proved everyone wrong. Akansha not only got selected in many dance and sports competition but also won many medals and trophies for her talent. Today Akansha is not only inspiration for other children in Brahmashakti Special School but also for those who think that children with special need cannot do anything.</p>\r\n', 'Admin', '127.0.0.1', 'Success', '2017-03-19 20:38:15'),
(5, '/bharam_shakti/images/anmol.jpg', '/bharam_shakti/images/slide1.jpg', 'ANMOL', '2013-01-01', 'Anmol was just 10 years old when she was admitted', '<p>Anmol was just 10 years old when she was admitted Brahmashakti Special School. She comes from a family where her parents could not understand her problems. Anmol&rsquo;s father took care of her both as her mother and father after her mother left them. Anmol&rsquo;s father runs a small grocery shop and found it difficult to handle both as Anmol only survived on milk and had become very weak. He took her to many hospitals but none could understand her problems. It was finally at AIIMS when the Doctors suggested her father to take her to Brahmashakti Special School which would take care of all her needs of education, therapies and specially to develop her food intake habits .</p>\r\n\r\n<p>Anmol took admission in Brahmashakti School in the year 2014. In-depth individual educational programme which included academics, communication skills, socialization and activity of daily living for Anmol was prepared by the school. Progress in Anmol&rsquo;s development in all the areas were found to be tremendous. Anmol had now started taking meals and not just the milk. Besides she showed interest in activities like sports and dance and school took care of it by assisting in developing her talents.</p>\r\n\r\n<p>Anmol started participating in various competitions conducted across the country and has won many medals and prizes. Today Anmol is not only a happy child but has also brought laurels to both her father and the school.</p>\r\n', 'Admin', '127.0.0.1', 'Success', '2017-03-20 03:47:43'),
(6, '/bharam_shakti/images/arti-img.jpg', '/bharam_shakti/images/slide1.jpg', 'AARTI', '2013-01-01', 'Aarti came to Brahmashakti Special School ', '<p>Aarti came to Brahmashakti Special School in the year 2010 as a child who not only was a special child but also came from a marginalized section of the society where her parents could not take care of her on their own. She was brought to Brahmashakti Special School by her parents where the school took care of her by providing her all the required facilities and education free of cost. Hard work to teachers of the school started showing results soon and Aarti showed immense interest in sports. School motivated her to participate in various sports events conducted for special children at all levels &ndash; state, national and international. She has won prize money of Rs. 4.5 lakh from the government and has become inspiration and role model for many other students. She not only supports her family by her prize money but also helps her parents in their work. Today Aarti is no less than any other ordinary child rather she is special not by her needs but by her deeds and has brought honour to both her parents and school.</p>\r\n', 'Admin', '127.0.0.1', 'Success', '2017-03-20 03:48:43');

-- --------------------------------------------------------

--
-- Table structure for table `video_gallery`
--

CREATE TABLE IF NOT EXISTS `video_gallery` (
`id` int(11) NOT NULL,
  `file_link` varchar(600) NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `ipadd` varchar(45) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `video_gallery`
--

INSERT INTO `video_gallery` (`id`, `file_link`, `created_by`, `ipadd`, `date`) VALUES
(11, 'https://www.youtube.com/embed/aQoY_2DkEew', 'Admin', '127.0.0.1', '2017-03-20 07:35:46.000000'),
(12, 'https://www.youtube.com/embed/aQoY_2DkEew', 'Admin', '127.0.0.1', '2017-03-20 07:35:48.000000'),
(13, 'https://www.youtube.com/embed/aQoY_2DkEew', 'Admin', '127.0.0.1', '2017-03-20 07:35:51.000000'),
(14, 'https://www.youtube.com/embed/aQoY_2DkEew', 'Admin', '127.0.0.1', '2017-03-20 07:35:54.000000'),
(15, 'https://www.youtube.com/embed/aQoY_2DkEew', 'Admin', '127.0.0.1', '2017-03-20 07:35:57.000000'),
(16, 'https://www.youtube.com/embed/aQoY_2DkEew', 'Admin', '127.0.0.1', '2017-03-20 07:36:00.000000'),
(17, 'https://www.youtube.com/embed/aQoY_2DkEew', 'Admin', '127.0.0.1', '2017-03-20 07:36:03.000000'),
(18, 'https://www.youtube.com/embed/aQoY_2DkEew', 'Admin', '127.0.0.1', '2017-03-20 07:36:05.000000'),
(19, 'https://www.youtube.com/embed/aQoY_2DkEew', 'Admin', '127.0.0.1', '2017-03-20 07:36:09.000000'),
(20, 'https://www.youtube.com/embed/aQoY_2DkEew', 'Admin', '127.0.0.1', '2017-03-20 07:57:51.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indexx`
--
ALTER TABLE `indexx`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_events`
--
ALTER TABLE `news_events`
 ADD PRIMARY KEY (`id`,`parent_link`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `success_stories`
--
ALTER TABLE `success_stories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_gallery`
--
ALTER TABLE `video_gallery`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `indexx`
--
ALTER TABLE `indexx`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news_events`
--
ALTER TABLE `news_events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `success_stories`
--
ALTER TABLE `success_stories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `video_gallery`
--
ALTER TABLE `video_gallery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
