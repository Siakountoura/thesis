-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 01:49 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gradingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `id` int(11) NOT NULL,
  `grading_id` int(11) NOT NULL,
  `criteria_title` varchar(250) NOT NULL,
  `criteria1` varchar(250) NOT NULL,
  `criteria2` varchar(250) NOT NULL,
  `criteria3` varchar(250) NOT NULL,
  `criteria4` varchar(250) NOT NULL,
  `vathmos` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criteria`
--

INSERT INTO `criteria` (`id`, `grading_id`, `criteria_title`, `criteria1`, `criteria2`, `criteria3`, `criteria4`, `vathmos`) VALUES
(19, 31, 'Τίτλος γραφήματος', 'Δεν υπάρχει τίτλος.', 'Ένας τίτλος υπάρχει στην κορυφή του γραφήματος.', 'Ο τίτλος σχετίζεται σαφώς με το πρόβλημα που περιγράφεται (περιλαμβάνει εξαρτώμενη και ανεξάρτητη μεταβλητή) και Αναγράφεται στο επάνω μέρος του γραφήματος.', 'Ο τίτλος είναι δημιουργικός και σχετίζεται σαφώς με το πρόβλημα που περιγράφεται (περιλαμβάνει εξαρτώμενη και ανεξάρτητη μεταβλητή). Αναγράφεται στο επάνω μέρος του γραφήματος.', '3'),
(20, 31, 'Ετικέτα Χ άξονα', 'Ο άξονας X δεν έχει ετικέτα.', 'Ο άξονας X έχει ετικέτα.', 'Ο άξονας X έχει μια σαφή ετικέτα που περιγράφει τις μονάδες που χρησιμοποιούνται για την ανεξάρτητη μεταβλητή.', 'Ο άξονας X έχει μια σαφή, τακτοποιημένη ετικέτα που περιγράφει τις μονάδες που χρησιμοποιούνται για την ανεξάρτητη μεταβλητή (π.χ. ημέρες, μήνες, ονόματα συμμετεχόντων).', '4'),
(21, 32, 'Μαθηματικές Έννοιες', 'Η εξήγηση δείχνει πολύ περιορισμένη κατανόηση των υποκείμενων εννοιών που απαιτούνται για την επίλυση του προβλήματος ή των προβλημάτων ή δεν γράφεται.', 'Η εξήγηση δείχνει μερική κατανόηση των μαθηματικών εννοιών που απαιτούνται για την επίλυση του προβλήματος ή των προβλημάτων.', 'Η εξήγηση δείχνει ουσιαστική κατανόηση των μαθηματικών εννοιών που χρησιμοποιούνται για την επίλυση του προβλήματος ή των προβλημάτων.', 'Η εξήγηση δείχνει πλήρη κατανόηση των μαθηματικών εννοιών που χρησιμοποιούνται για την επίλυση του προβλήματος ή των προβλημάτων.', '3'),
(22, 32, 'Ολοκλήρωση', 'Αρκετά από τα προβλήματα δεν έχουν ολοκληρωθεί.', 'Όλα εκτός από δύο από τα προβλήματα έχουν ολοκληρωθεί.', 'Όλα εκτός από ένα από τα προβλήματα έχουν ολοκληρωθεί.', 'Όλα τα προβλήματα έχουν ολοκληρωθεί.', '4'),
(23, 32, 'Μονάδες μέτρησης γραφήματος', 'Οι μονάδες δεν περιγράφονται ούτε έχουν το κατάλληλο μέγεθος για το σύνολο δεδομένων.', 'Όλες οι μονάδες περιγράφονται (σε ένα κλειδί ή με ετικέτες), αλλά δεν έχουν το κατάλληλο μέγεθος για το σύνολο δεδομένων.', 'Οι περισσότερες μονάδες περιγράφονται (σε ένα κλειδί ή με ετικέτες) και έχουν το κατάλληλο μέγεθος για το σύνολο δεδομένων.', 'Όλες οι μονάδες περιγράφονται (σε ένα κλειδί ή με ετικέτες) και έχουν το κατάλληλο μέγεθος για το σύνολο δεδομένων.', '4'),
(24, 32, 'Tακτοποίηση και ελκυστικότητα γραφήματος', 'Φαίνεται ακατάστατο και βιαστικά φτιαγμένο. Οι γραμμές είναι εμφανώς στραβές.', 'Οι γραμμές είναι τακτοποιημένες, αλλά το γράφημα φαίνεται αρκετά απλό.', 'Τακτοποιημένο και σχετικά ελκυστικό. Ένας χάρακας και ένα χαρτί γραφήματος (ή πρόγραμμα υπολογιστή γραφικής παράστασης) χρησιμοποιούνται για να κάνουν το γράφημα πιο ευανάγνωστο.', 'Εξαιρετικά καλά σχεδιασμένο, τακτοποιημένο και ελκυστικό. Χρώματα που πάνε καλά μαζί χρησιμοποιούνται για να κάνουν το γράφημα πιο ευανάγνωστο. Χρησιμοποιείται χάρακας και χαρτί γραφήματος (ή πρόγραμμα υπολογιστή γραφικής παράστασης).', '4'),
(25, 32, 'Ετικέτα Χ άξονα', 'Ο άξονας X δεν έχει ετικέτα.', 'Ο άξονας X έχει ετικέτα.', 'Ο άξονας X έχει μια σαφή ετικέτα που περιγράφει τις μονάδες που χρησιμοποιούνται για την ανεξάρτητη μεταβλητή.', 'Ο άξονας X έχει μια σαφή, τακτοποιημένη ετικέτα που περιγράφει τις μονάδες που χρησιμοποιούνται για την ανεξάρτητη μεταβλητή (π.χ. ημέρες, μήνες, ονόματα συμμετεχόντων).', '3'),
(26, 32, 'Ετικέτα Y άξονα', 'Ο άξονας Υ δεν έχει ετικέτα.', 'Ο άξονας Υ έχει ετικέτα.', 'Ο άξονας Υ έχει σαφή ετικέτα που περιγράφει τις μονάδες και την εξαρτώμενη μεταβλητή (π.χ. % σκυλοτροφής που καταναλώνεται, βαθμό ικανοποίησης).', 'Ο άξονας Υ έχει μια σαφή, τακτοποιημένη ετικέτα που περιγράφει τις μονάδες και την εξαρτώμενη μεταβλητή (π.χ. % σκυλοτροφής που καταναλώνεται, βαθμό ικανοποίησης).', '3'),
(27, 33, 'Μαθηματικές Έννοιες', 'Η εξήγηση δείχνει πολύ περιορισμένη κατανόηση των υποκείμενων εννοιών που απαιτούνται για την επίλυση του προβλήματος ή των προβλημάτων ή δεν γράφεται.', 'Η εξήγηση δείχνει μερική κατανόηση των μαθηματικών εννοιών που απαιτούνται για την επίλυση του προβλήματος ή των προβλημάτων.', 'Η εξήγηση δείχνει ουσιαστική κατανόηση των μαθηματικών εννοιών που χρησιμοποιούνται για την επίλυση του προβλήματος ή των προβλημάτων.', 'Η εξήγηση δείχνει πλήρη κατανόηση των μαθηματικών εννοιών που χρησιμοποιούνται για την επίλυση του προβλήματος ή των προβλημάτων.', '4'),
(28, 33, 'Ολοκλήρωση', 'Αρκετά από τα προβλήματα δεν έχουν ολοκληρωθεί.', 'Όλα εκτός από δύο από τα προβλήματα έχουν ολοκληρωθεί.', 'Όλα εκτός από ένα από τα προβλήματα έχουν ολοκληρωθεί.', 'Όλα τα προβλήματα έχουν ολοκληρωθεί.', '3'),
(29, 33, 'Μονάδες μέτρησης γραφήματος', 'Οι μονάδες δεν περιγράφονται ούτε έχουν το κατάλληλο μέγεθος για το σύνολο δεδομένων.', 'Όλες οι μονάδες περιγράφονται (σε ένα κλειδί ή με ετικέτες), αλλά δεν έχουν το κατάλληλο μέγεθος για το σύνολο δεδομένων.', 'Οι περισσότερες μονάδες περιγράφονται (σε ένα κλειδί ή με ετικέτες) και έχουν το κατάλληλο μέγεθος για το σύνολο δεδομένων.', 'Όλες οι μονάδες περιγράφονται (σε ένα κλειδί ή με ετικέτες) και έχουν το κατάλληλο μέγεθος για το σύνολο δεδομένων.', '4'),
(30, 33, 'Tακτοποίηση και ελκυστικότητα γραφήματος', 'Φαίνεται ακατάστατο και βιαστικά φτιαγμένο. Οι γραμμές είναι εμφανώς στραβές.', 'Οι γραμμές είναι τακτοποιημένες, αλλά το γράφημα φαίνεται αρκετά απλό.', 'Τακτοποιημένο και σχετικά ελκυστικό. Ένας χάρακας και ένα χαρτί γραφήματος (ή πρόγραμμα υπολογιστή γραφικής παράστασης) χρησιμοποιούνται για να κάνουν το γράφημα πιο ευανάγνωστο.', 'Εξαιρετικά καλά σχεδιασμένο, τακτοποιημένο και ελκυστικό. Χρώματα που πάνε καλά μαζί χρησιμοποιούνται για να κάνουν το γράφημα πιο ευανάγνωστο. Χρησιμοποιείται χάρακας και χαρτί γραφήματος (ή πρόγραμμα υπολογιστή γραφικής παράστασης).', '4'),
(31, 33, 'Ετικέτα Χ άξονα', 'Ο άξονας X δεν έχει ετικέτα.', 'Ο άξονας X έχει ετικέτα.', 'Ο άξονας X έχει μια σαφή ετικέτα που περιγράφει τις μονάδες που χρησιμοποιούνται για την ανεξάρτητη μεταβλητή.', 'Ο άξονας X έχει μια σαφή, τακτοποιημένη ετικέτα που περιγράφει τις μονάδες που χρησιμοποιούνται για την ανεξάρτητη μεταβλητή (π.χ. ημέρες, μήνες, ονόματα συμμετεχόντων).', '3'),
(32, 33, 'Ετικέτα Y άξονα', 'Ο άξονας Υ δεν έχει ετικέτα.', 'Ο άξονας Υ έχει ετικέτα.', 'Ο άξονας Υ έχει σαφή ετικέτα που περιγράφει τις μονάδες και την εξαρτώμενη μεταβλητή (π.χ. % σκυλοτροφής που καταναλώνεται, βαθμό ικανοποίησης).', 'Ο άξονας Υ έχει μια σαφή, τακτοποιημένη ετικέτα που περιγράφει τις μονάδες και την εξαρτώμενη μεταβλητή (π.χ. % σκυλοτροφής που καταναλώνεται, βαθμό ικανοποίησης).', '3'),
(33, 34, 'Χρήση Xειρισμών', 'Ο μαθητής σπάνια ακούει και συχνά \"παίζει\" με τους χειρισμούς αντί να τους χρησιμοποιεί σύμφωνα με τις οδηγίες.', 'Ο μαθητής μερικές φορές ακούει και ακολουθεί οδηγίες και χρησιμοποιεί χειρισμούς κατάλληλα όταν του υπενθυμίζουν.', 'Ο μαθητής συνήθως ακούει και ακολουθεί οδηγίες και χρησιμοποιεί χειρισμούς σύμφωνα με τις οδηγίες τις περισσότερες φορές.', 'Ο μαθητής ακούει πάντα και ακολουθεί οδηγίες και χρησιμοποιεί μόνο χειρισμούς σύμφωνα με τις οδηγίες.', '4'),
(34, 34, 'Τίτλος γραφήματος', 'Δεν υπάρχει τίτλος.', 'Ένας τίτλος υπάρχει στην κορυφή του γραφήματος.', 'Ο τίτλος σχετίζεται σαφώς με το πρόβλημα που περιγράφεται (περιλαμβάνει εξαρτώμενη και ανεξάρτητη μεταβλητή) και Αναγράφεται στο επάνω μέρος του γραφήματος.', 'Ο τίτλος είναι δημιουργικός και σχετίζεται σαφώς με το πρόβλημα που περιγράφεται (περιλαμβάνει εξαρτώμενη και ανεξάρτητη μεταβλητή). Αναγράφεται στο επάνω μέρος του γραφήματος.', '3'),
(35, 34, 'Συνεργασιμότητα', 'Ο μαθητής δεν δούλευε αποτελεσματικά με άλλους.', 'Ο μαθητής συνεργάστηκε με άλλους, αλλά χρειαζόταν παρότρυνση για να παραμείνει αφοσιωμένος στην εργασία.', 'Ο μαθητής ήταν αφοσιωμένος συνεργάτης, αλλά δυσκολευόταν να ακούσει άλλους ή/ και να δουλέψει συνεργατικά.', 'Ο μαθητής ήταν ένας αφοσιωμένος συνεργάτης, ακούγοντας προτάσεις άλλων και δουλεύοντας συνεργατικά καθ \'όλη τη διάρκεια του μαθήματος.', '3'),
(36, 34, 'Στρατηγική / διαδικασίες', 'Σπάνια χρησιμοποιεί μια αποτελεσματική στρατηγική για την επίλυση προβλημάτων.', 'Μερικές φορές χρησιμοποιεί μια αποτελεσματική στρατηγική για την επίλυση προβλημάτων, αλλά δεν το κάνει με συνοχή.', 'Συνήθως, χρησιμοποιεί μια αποτελεσματική στρατηγική για την επίλυση του προβλήματος ή των προβλημάτων.', 'Συνήθως, χρησιμοποιεί μια αποτελεσματική και αποδοτική στρατηγική για την επίλυση του προβλήματος ή των προβλημάτων.', '3'),
(45, 31, 'Ετικέτα Y άξονα', 'Ο άξονας Υ δεν έχει ετικέτα.', 'Ο άξονας Υ έχει ετικέτα.', 'Ο άξονας Υ έχει σαφή ετικέτα που περιγράφει τις μονάδες και την εξαρτώμενη μεταβλητή (π.χ. % σκυλοτροφής που καταναλώνεται, βαθμό ικανοποίησης).', 'Ο άξονας Υ έχει μια σαφή, τακτοποιημένη ετικέτα που περιγράφει τις μονάδες και την εξαρτώμενη μεταβλητή (π.χ. % σκυλοτροφής που καταναλώνεται, βαθμό ικανοποίησης).', '4');

-- --------------------------------------------------------

--
-- Table structure for table `grading`
--

CREATE TABLE `grading` (
  `id` int(11) NOT NULL,
  `titlos` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `teliki_vathmologia` int(11) NOT NULL,
  `creation_date` date NOT NULL,
  `modification_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grading`
--

INSERT INTO `grading` (`id`, `titlos`, `student_id`, `teacher_id`, `teliki_vathmologia`, `creation_date`, `modification_date`) VALUES
(31, 'Τεστ2', 37, 1, 11, '2022-01-31', '2022-02-10'),
(32, 'Αξιολόγηση 1η', 3, 1, 21, '2022-02-04', '2022-02-04'),
(33, 'Αξιολόγηση 2η', 3, 1, 21, '2022-02-04', '2022-02-04'),
(34, 'Αξιολόγηση 3η', 3, 1, 13, '2022-02-04', '2022-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `selections`
--

CREATE TABLE `selections` (
  `id` int(25) NOT NULL,
  `category` varchar(350) NOT NULL,
  `grade4` varchar(1000) NOT NULL,
  `grade3` varchar(1000) NOT NULL,
  `grade2` varchar(1000) NOT NULL,
  `grade1` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `selections`
--

INSERT INTO `selections` (`id`, `category`, `grade4`, `grade3`, `grade2`, `grade1`) VALUES
(1, 'Μαθηματικές Έννοιες', 'Η εξήγηση δείχνει πλήρη κατανόηση των μαθηματικών εννοιών που χρησιμοποιούνται για την επίλυση του προβλήματος ή των προβλημάτων.', 'Η εξήγηση δείχνει ουσιαστική κατανόηση των μαθηματικών εννοιών που χρησιμοποιούνται για την επίλυση του προβλήματος ή των προβλημάτων.', 'Η εξήγηση δείχνει μερική κατανόηση των μαθηματικών εννοιών που απαιτούνται για την επίλυση του προβλήματος ή των προβλημάτων.', 'Η εξήγηση δείχνει πολύ περιορισμένη κατανόηση των υποκείμενων εννοιών που απαιτούνται για την επίλυση του προβλήματος ή των προβλημάτων ή δεν γράφεται.'),
(2, 'Μαθηματικός Συλλογισμός', 'Χρησιμοποιεί πολύπλοκο και εκλεπτυσμένο μαθηματικό συλλογισμό.', 'Χρησιμοποιεί αποτελεσματικό μαθηματικό συλλογισμό.', 'Χρησιμοποιεί κάποια στοιχεία μαθηματικού συλλογισμού.', 'Λίγα στοιχεία μαθηματικής λογικής.'),
(3, 'Μαθηματικά Σφάλματα', 'Το 90-100% των βημάτων και λύσεων δεν έχουν μαθηματικά λάθη.', 'Σχεδόν όλα (85-89%) τα βήματα και οι λύσεις δεν έχουν μαθηματικά λάθη.', 'Τα περισσότερα (75-84%) βήματα και λύσεις δεν έχουν μαθηματικά λάθη.', 'Πάνω από το 75% των βημάτων και των λύσεων έχουν μαθηματικά λάθη.'),
(4, 'Χρήση Xειρισμών', 'Ο μαθητής ακούει πάντα και ακολουθεί οδηγίες και χρησιμοποιεί μόνο χειρισμούς σύμφωνα με τις οδηγίες.', 'Ο μαθητής συνήθως ακούει και ακολουθεί οδηγίες και χρησιμοποιεί χειρισμούς σύμφωνα με τις οδηγίες τις περισσότερες φορές.', 'Ο μαθητής μερικές φορές ακούει και ακολουθεί οδηγίες και χρησιμοποιεί χειρισμούς κατάλληλα όταν του υπενθυμίζουν.', 'Ο μαθητής σπάνια ακούει και συχνά \"παίζει\" με τους χειρισμούς αντί να τους χρησιμοποιεί σύμφωνα με τις οδηγίες.'),
(5, 'Συνεργασιμότητα', 'Ο μαθητής ήταν ένας αφοσιωμένος συνεργάτης, ακούγοντας προτάσεις άλλων και δουλεύοντας συνεργατικά καθ \'όλη τη διάρκεια του μαθήματος.', 'Ο μαθητής ήταν αφοσιωμένος συνεργάτης, αλλά δυσκολευόταν να ακούσει άλλους ή/ και να δουλέψει συνεργατικά.', 'Ο μαθητής συνεργάστηκε με άλλους, αλλά χρειαζόταν παρότρυνση για να παραμείνει αφοσιωμένος στην εργασία.', 'Ο μαθητής δεν δούλευε αποτελεσματικά με άλλους.'),
(6, 'Επεξηγηματικότητα', 'Η εξήγηση είναι λεπτομερής και σαφής.', 'Η εξήγηση είναι σαφής.', 'Η εξήγηση είναι λίγο δύσκολο να κατανοηθεί, αλλά περιλαμβάνει κρίσιμα στοιχεία.', 'Η εξήγηση είναι δύσκολο να κατανοηθεί και λείπουν πολλά στοιχεία ή δεν εχουν συμπεριληφθεί.'),
(7, 'Διορθώσεις', 'Η εργασία έχει ελεγχθεί από δύο συμμαθητές και έχουν γίνει όλες οι κατάλληλες διορθώσεις.', 'Η εργασία έχει ελεγχθεί από έναν συμμαθητή και έχουν γίνει όλες οι κατάλληλες διορθώσεις.', 'Η εργασία έχει ελεγχθεί από έναν συμμαθητή, αλλά δεν έγιναν κάποιες διορθώσεις.', 'Η εργασία δεν ελέγχθηκε από κάποιον συμμαθητή ή δεν έγιναν διορθώσεις με βάση τα σχόλια.'),
(8, 'Τακτικότητα και οργανωτικότητα', 'Το έργο παρουσιάζεται με έναν τακτοποιημένο, σαφή, οργανωμένο τρόπο που είναι εύκολο να διαβαστεί.', 'Το έργο παρουσιάζεται με έναν τακτοποιημένο και οργανωμένο τρόπο που είναι συνήθως ευανάγνωστος.', 'Το έργο παρουσιάζεται με οργανωμένο τρόπο, αλλά μπορεί να είναι δύσκολο να διαβαστεί κατά διαστήματα.', 'Το έργο φαίνεται τσαπατσούλικο και ανοργάνωτο. Είναι δύσκολο να γνωρίζουμε ποιες πληροφορίες συνδέονται.'),
(9, 'Διαγράμματα και σκίτσα', 'Τα διαγράμματα ή/και τα σκίτσα είναι σαφή και προσθέτουν σε μεγάλο βαθμό στην κατανόηση από τον αναγνώστη της διαδικασίας ή των διαδικασιών.', 'Τα διαγράμματα ή/και τα σκίτσα είναι σαφή και εύκολα κατανοητά.', 'Τα διαγράμματα ή/και τα σκίτσα είναι κάπως δύσκολο να κατανοηθούν.', 'Τα διαγράμματα ή/και τα σκίτσα είναι δύσκολο να κατανοηθούν ή δεν χρησιμοποιούνται.'),
(10, 'Ολοκλήρωση', 'Όλα τα προβλήματα έχουν ολοκληρωθεί.', 'Όλα εκτός από ένα από τα προβλήματα έχουν ολοκληρωθεί.', 'Όλα εκτός από δύο από τα προβλήματα έχουν ολοκληρωθεί.', 'Αρκετά από τα προβλήματα δεν έχουν ολοκληρωθεί.'),
(11, 'Μαθηματική ορολογία και σημειογραφία', 'Η σωστή ορολογία και σημειογραφία χρησιμοποιούνται πάντα, καθιστώντας εύκολη την κατανόηση.', 'Η σωστή ορολογία και σημειογραφία χρησιμοποιούνται συνήθως, καθιστώντας αρκετά εύκολη την κατανόηση.', 'Χρησιμοποιείται σωστή ορολογία και σημειογραφία , αλλά μερικές φορές δεν γίνεται εύκολα κατανοητή.', 'Γίνεται μικρή ή πολύ ακατάλληλη χρήση της ορολογίας και της σημειογραφίας.'),
(12, 'Στρατηγική / διαδικασίες', 'Συνήθως, χρησιμοποιεί μια αποτελεσματική και αποδοτική στρατηγική για την επίλυση του προβλήματος ή των προβλημάτων.', 'Συνήθως, χρησιμοποιεί μια αποτελεσματική στρατηγική για την επίλυση του προβλήματος ή των προβλημάτων.', 'Μερικές φορές χρησιμοποιεί μια αποτελεσματική στρατηγική για την επίλυση προβλημάτων, αλλά δεν το κάνει με συνοχή.', 'Σπάνια χρησιμοποιεί μια αποτελεσματική στρατηγική για την επίλυση προβλημάτων.'),
(13, 'Μονάδες μέτρησης γραφήματος', 'Όλες οι μονάδες περιγράφονται (σε ένα κλειδί ή με ετικέτες) και έχουν το κατάλληλο μέγεθος για το σύνολο δεδομένων.', 'Οι περισσότερες μονάδες περιγράφονται (σε ένα κλειδί ή με ετικέτες) και έχουν το κατάλληλο μέγεθος για το σύνολο δεδομένων.', 'Όλες οι μονάδες περιγράφονται (σε ένα κλειδί ή με ετικέτες), αλλά δεν έχουν το κατάλληλο μέγεθος για το σύνολο δεδομένων.', 'Οι μονάδες δεν περιγράφονται ούτε έχουν το κατάλληλο μέγεθος για το σύνολο δεδομένων.'),
(14, 'Tακτοποίηση και ελκυστικότητα γραφήματος', 'Εξαιρετικά καλά σχεδιασμένο, τακτοποιημένο και ελκυστικό. Χρώματα που πάνε καλά μαζί χρησιμοποιούνται για να κάνουν το γράφημα πιο ευανάγνωστο. Χρησιμοποιείται χάρακας και χαρτί γραφήματος (ή πρόγραμμα υπολογιστή γραφικής παράστασης).', 'Τακτοποιημένο και σχετικά ελκυστικό. Ένας χάρακας και ένα χαρτί γραφήματος (ή πρόγραμμα υπολογιστή γραφικής παράστασης) χρησιμοποιούνται για να κάνουν το γράφημα πιο ευανάγνωστο.', 'Οι γραμμές είναι τακτοποιημένες, αλλά το γράφημα φαίνεται αρκετά απλό.', 'Φαίνεται ακατάστατο και βιαστικά φτιαγμένο. Οι γραμμές είναι εμφανώς στραβές.'),
(15, 'Ακρίβεια σχεδιαγράμματος', 'Όλα τα σημεία σχεδιάζονται σωστά και είναι ευανάγνωστα. Ένας χάρακας χρησιμοποιείται για να συνδέσει τακτοποιημένα τα σημεία ή να κάνει τις γραμμές, εάν δεν έχει γίνει χρήση μηχανογραφημένου προγράμματος γραφικής παράστασης.', 'Όλα τα σημεία σχεδιάζονται σωστά και είναι είναι ευανάγνωστα.', 'Όλα τα σημεία σχεδιάζονται σωστά.', 'Οι πόντοι δεν σχεδιάζονται σωστά ή συμπεριλήφθηκαν επιπλέον πόντοι.'),
(16, 'Τύπος γραφήματος που έχει επιλεχθεί', 'Το γράφημα ταιριάζει καλά στα δεδομένα και είναι εύκολο να ερμηνευτεί.', 'Το γράφημα είναι επαρκές και δεν διαστρεβλώνει τα δεδομένα, αλλά η ερμηνεία των δεδομένων είναι κάπως δύσκολη.', 'Το γράφημα διαστρεβλώνει κάπως τα δεδομένα και η ερμηνεία των δεδομένων είναι κάπως δύσκολη.', 'Το γράφημα διαστρεβλώνει σοβαρά τα δεδομένα καθιστώντας την ερμηνεία σχεδόν αδύνατη.'),
(17, 'Πίνακας δεδομένων', 'Τα δεδομένα στον πίνακα είναι καλά οργανωμένα, ακριβή και ευανάγνωστα.', 'Τα δεδομένα στον πίνακα είναι οργανωμένα, ακριβή και ευανάγνωστα.', 'Τα δεδομένα στον πίνακα είναι ακριβή και ευανάγνωστα.', 'Τα δεδομένα στον πίνακα δεν είναι ακριβή ή/και δεν είναι ευανάγνωστα.'),
(18, 'Τίτλος γραφήματος', 'Ο τίτλος είναι δημιουργικός και σχετίζεται σαφώς με το πρόβλημα που περιγράφεται (περιλαμβάνει εξαρτώμενη και ανεξάρτητη μεταβλητή). Αναγράφεται στο επάνω μέρος του γραφήματος.', 'Ο τίτλος σχετίζεται σαφώς με το πρόβλημα που περιγράφεται (περιλαμβάνει εξαρτώμενη και ανεξάρτητη μεταβλητή) και Αναγράφεται στο επάνω μέρος του γραφήματος.', 'Ένας τίτλος υπάρχει στην κορυφή του γραφήματος.', 'Δεν υπάρχει τίτλος.'),
(19, 'Ετικέτα Χ άξονα', 'Ο άξονας X έχει μια σαφή, τακτοποιημένη ετικέτα που περιγράφει τις μονάδες που χρησιμοποιούνται για την ανεξάρτητη μεταβλητή (π.χ. ημέρες, μήνες, ονόματα συμμετεχόντων).', 'Ο άξονας X έχει μια σαφή ετικέτα που περιγράφει τις μονάδες που χρησιμοποιούνται για την ανεξάρτητη μεταβλητή.', 'Ο άξονας X έχει ετικέτα.', 'Ο άξονας X δεν έχει ετικέτα.'),
(20, 'Ετικέτα Y άξονα', 'Ο άξονας Υ έχει μια σαφή, τακτοποιημένη ετικέτα που περιγράφει τις μονάδες και την εξαρτώμενη μεταβλητή (π.χ. % σκυλοτροφής που καταναλώνεται, βαθμό ικανοποίησης).', 'Ο άξονας Υ έχει σαφή ετικέτα που περιγράφει τις μονάδες και την εξαρτώμενη μεταβλητή (π.χ. % σκυλοτροφής που καταναλώνεται, βαθμό ικανοποίησης).', 'Ο άξονας Υ έχει ετικέτα.', 'Ο άξονας Υ δεν έχει ετικέτα.');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `am` varchar(45) NOT NULL,
  `vathmida` varchar(45) NOT NULL,
  `taksi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `last_name`, `am`, `vathmida`, `taksi`) VALUES
(1, 'Αργήρης', 'Συρίγος', '5235', 'Γυμνάσιο', 'Γ2'),
(3, 'Ελένη', 'Γαλάνη', '1697', 'Λύκειο', 'Α3'),
(4, 'Παναγιώτα', 'Ζαφειροπούλου', '6532', 'Λύκειο', 'Β4'),
(36, 'Μιχάλης ', 'Παυλίδης', '1122', 'Γυμνάσιο', 'Α3'),
(37, 'Μαριαλένα', 'Νικολαΐδου', '4334', 'Λύκειο', 'Β4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES
(1, 'Anastasia Kountoura', 'ciakou@live.com', 'siakou', '$2y$10$QCYSnPmxm1VBzuOB8.EwGeua9QHbj.TO6kawQDNAwMz6kc0URK/Ia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criteria - grading id` (`grading_id`);

--
-- Indexes for table `grading`
--
ALTER TABLE `grading`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grading - student id` (`student_id`),
  ADD KEY `grading - user id` (`teacher_id`);

--
-- Indexes for table `selections`
--
ALTER TABLE `selections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `grading`
--
ALTER TABLE `grading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `selections`
--
ALTER TABLE `selections`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `criteria`
--
ALTER TABLE `criteria`
  ADD CONSTRAINT `criteria - grading id` FOREIGN KEY (`grading_id`) REFERENCES `grading` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `grading`
--
ALTER TABLE `grading`
  ADD CONSTRAINT `grading - student id` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grading - user id` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`usersId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
