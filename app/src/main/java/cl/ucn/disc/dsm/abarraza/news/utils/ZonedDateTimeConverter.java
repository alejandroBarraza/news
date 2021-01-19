package cl.ucn.disc.dsm.abarraza.news.utils;

import androidx.room.TypeConverter;

import org.threeten.bp.ZonedDateTime;

/**
 *  the ZonedDateTimeConverter class
 *  @author Diego Calderón
 */
public class ZonedDateTimeConverter {
        @TypeConverter
        public static ZonedDateTime toDate(String dateString) {
            if (dateString == null) {
                return null;
            } else {
                return ZonedDateTime.parse(dateString);
            }
        }

        @TypeConverter
        public static String toDateString(ZonedDateTime date) {
            if (date == null) {
                return null;
            } else {
                return date.toString();
            }
        }
}
