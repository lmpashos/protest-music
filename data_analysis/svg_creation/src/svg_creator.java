import java.io.*;
import javax.xml.parsers.*;
import org.w3c.dom.*;
import javax.xml.transform.*;
import javax.xml.transform.dom.DOMSource;
import javax.xml.transform.stream.StreamResult;
import javax.xml.transform.stream.StreamSource;
import javax.xml.xpath.XPath;
import javax.xml.xpath.XPathConstants;
import javax.xml.xpath.XPathExpression;
import javax.xml.xpath.XPathFactory;

public class svg_creator {
	public static void main(String[] arg) throws Exception {

		DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();
		DocumentBuilder builder = factory.newDocumentBuilder();
		Document doc = builder.parse("data.xml");

		TransformerFactory transformerFactory = TransformerFactory.newInstance();
		Source xslt = new StreamSource(new File("data_to_svg.xsl"));
		Transformer transformer = transformerFactory.newTransformer(xslt);
		
		File output = new File("output");
		if (! output.exists()) {
			output.mkdir();
			new File("output/the_great_depression").mkdir();
			new File("output/the_great_depression/protest").mkdir();
			new File("output/the_great_depression/non_protest").mkdir();
			new File("output/vietnam").mkdir();
			new File("output/vietnam/protest").mkdir();
			new File("output/vietnam/non_protest").mkdir();
			new File("output/modern").mkdir();
			new File("output/modern/protest").mkdir();
			new File("output/modern/non_protest").mkdir();
        }		
		    
		int x = 1;
		
        XPathFactory xpathFactory = XPathFactory.newInstance();
        XPath xpath = xpathFactory.newXPath();

		NodeList list = doc.getFirstChild().getChildNodes();

		for (int i = 0; i < list.getLength(); i++) {
			Node element = list.item(i).cloneNode(true);
			if (element.hasChildNodes()) {
				Source src = new DOMSource(element);
				String title = getTitle(doc, xpath, x);
				String directory = getDirectory(doc, xpath, x);
				FileOutputStream fs = new FileOutputStream(directory + title + ".svg");
				Result dest = new StreamResult(fs);
				transformer.transform(src, dest);
				fs.close();
				x++;
			}
		}
	}
	
	public static String getTitle(Document doc, XPath xpath, int index) throws Exception {
		XPathExpression expr = xpath.compile("data/song[" + index + "]/title");
		String title = (String) expr.evaluate(doc, XPathConstants.STRING);
		return title.replaceAll(" ", "_").toLowerCase();
	}
	
	public static String getDirectory(Document doc, XPath xpath, int index) throws Exception {
		String directory = null;
		XPathExpression expr = xpath.compile("data/song[" + index + "]/era");
		String era = (String) expr.evaluate(doc, XPathConstants.STRING);
		expr = xpath.compile("data/song[" + index + "]/protest");
		Double value = (Double) expr.evaluate(doc, XPathConstants.NUMBER);
		String protest = null;
		
		if(value == 0)
			protest = "non_protest";
		else
			protest = "protest";
		
		directory = "output/" + era + "/" + protest + "/";
		return directory;
	}
}
