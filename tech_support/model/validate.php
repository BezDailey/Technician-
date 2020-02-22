<?php 
    class Validate {
        private static $phonePattern = '/^\(\d{3}\) \d{3}-\d{4}/';

        public static function validateText($value, $isRequired = true, $min = 1, $max = 255) {
            if (!$isRequired && empty($value)) {
                return true;
            } else if ($isRequired && empty($value)) {
                return "Required.";
            } else if (strlen($value) < $min) {
                return 'Too short.';
            } else if (strlen($value) > $max) {
                return 'Too long.';
            } else {
                return true;
            }
        }

        public static function validatePhone($value) {
            $validate = self::validateText($value, true, 13, 14);
            if ($validate === true) {
                $match = preg_match(self::$phonePattern, $value);
                if($match === 1) {
                    return true;
                } else {
                    return "Use (999) 999-999 format.";
                }   
            } else {
                return $validate;
            }
        }

        public static function validateEmail($email) {
            $validate = self::validateText($email, true, 1, 51);
            if ($validate === true) {
                $parts = explode("@", $email);
                if (count($parts) < 2) {
                    return 'At sign required.';
                }
                if (count($parts) > 2) {
                    return 'Only one at sign allowed.';
                }
                $local = $parts[0];
                $domain = $parts[1];
                if (strlen($local) > 64) {
                    return 'Username part too long';
                }
                if (strlen($domain) > 255) {
                    return 'Domain name part too long';
                }

                $atom = '[[:alnum:]_!#$%\'*+\/=?^`{|}~-]+';
                $dotatom = '(\.' . $atom . ')*';
                $address = '(^' . $atom . $dotatom . '$)';

                $char = '([^\\\\"])';
                $esc = '(\\\\[\\\\"])';
                $text = '(' . $char . '|' . $esc . ')+';
                $quoted = '(^"' . $text . '")$';

                $localPattern = '/' . $address . '|' . $quoted . '/';

                $match = preg_match($localPattern, $local);
                if ($match === false) {
                    return "Error testing local field.";
                } else if ($match != 1) {
                    return 'Invalid username part.';
                }

                $hostname = '([[:alnum:]]([-[:alnum:]]{0,62}[[:alnum:]])?)';
                $hostnames = '(' . $hostname . '(\.' . $hostname . ')*)';
                $top = '\.[[:alnum:]]{2,6}';
                $domainPattern = '/^' . $hostnames . $top . '$/';

                $match = preg_match($domainPattern, $domain);
                if ($match === false) {
                    return "Error testing domain field.";
                } else if ($match != 1) {
                    return "Invalid domain name part.";
                } else {
                    return true;
                }


            } else {
                return $validate;
            }
        }
    }
?>