package _01_Basics;

public class _07_Default_Initialization
{
    static boolean myBoolean;
    static byte myByte;
    static short myShort;
    static int myInt;
    static long myLong;
    static float myFloat;
    static double myDouble;
    static char myChar;

    public static void main(String[] args)
    {
        int localInt;

        // System.out.println("localInt= " + localInt); // does not compile

        System.out.println("myBoolean= " + myBoolean);// false
        System.out.println("myByte= " + myByte);      // 0
        System.out.println("myShort= " + myShort);    // 0
        System.out.println("myInt= " + myInt);        // 0
        System.out.println("myLong= " + myLong);      // 0
        System.out.println("myFloat= " + myFloat);    // 0.0
        System.out.println("myDouble= " + myDouble);  // 0.0
        System.out.println("myChar= " + myChar);      // \u0000
    }

}
